<?php

namespace App\Http\Controllers;

use App\CalcCarColor;
use App\CalcDiskColor;
use App\CalcDiskSize;
use App\DiskGallery;
use App\DiskUslugi;
use App\Feedback;
use App\Mail\CalcFormSubmitted;
use App\Mail\CallbackFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\DataType;

class HomeController extends Controller
{
    private function getPrices() {
        $prices = CalcDiskSize::orderBy("size", "ASC")->get();

        $transp = [];
        foreach ($prices as $price) {
            $transp["titles"][$price->size] = (int)$price->size . "''";
            $transp["pokraska"][$price->size] = $price->price;
            $transp["grind"][$price->size] = $price->price_grind;
            $transp["dimond_grind"][$price->size] = $price->price_dimond_grind;
            $transp["tiremount"][$price->size] = $price->price_tiremount;
            $transp["prokat"][$price->size] = $price->price_prokat;
            $transp["akril"][$price->size] = $price->price_akril;
            $transp["other"][$price->size] = $price->price_chromirovanie;
        }

        return $transp;
    }

    public function index()
    {
        $minutes = 10;

        // Calc Data
        $calcValues = Cache::remember('calc_data', $minutes, function () {

            $car_colors = CalcCarColor::select(["name", "value_16 as hash", "body_render_img"])->orderBy("sort", "ASC")->get()->toArray();
            foreach ($car_colors as $k => $car_color) {
                $car_color["hash"] = preg_replace('/^#/', '', $car_color["hash"]);
                $car_color["body_render_img"] = Voyager::image($car_color["body_render_img"]);
                $car_colors[$k] = $car_color;
            }

            $DT_calc_disk_colors = DataType::where("name", "calc_disk_colors")->with("rows")->first();
            $sectionRow = $DT_calc_disk_colors->rows->where("field", "section")->first();
            $sectionOptions = json_decode($sectionRow->details, true);
            $disk_color_sections_options = isset($sectionOptions["options"]) ? $sectionOptions["options"] : [];
            $disk_color_sections = [];
            foreach ($disk_color_sections_options as $key => $name) {
                $disk_color_sections[] = [
                    "key" => $key,
                    "name" => $name,
                ];
            }
            $disk_colors = CalcDiskColor::select(["section", "name", "picture", "value_16 as hash", "rate", "wheel_img", "wheel_polished_img"])->orderBy("sort", "ASC")->get()->toArray();
            foreach ($disk_colors as $k => $disk_color) {
                $disk_color["hash"] = preg_replace('/^#/', '', $disk_color["hash"]);
                $disk_color["wheel_img"] = Voyager::image($disk_color["wheel_img"]);
                $disk_color["wheel_polished_img"] = Voyager::image($disk_color["wheel_polished_img"]);
                $disk_colors[$k] = $disk_color;
            }

            $disk_sizes = CalcDiskSize::select(["size", "price", "price_grind", "price_tiremount"])->get()->toArray();
            foreach ($disk_sizes as $k => $disk_size) {
                $disk_size["label"] = $disk_size["size"] . "\"";
                $disk_size["price"] = doubleVal($disk_size["price"]);
                $disk_size["price_grind"] = doubleVal($disk_size["price_grind"]);
                $disk_size["price_tiremount"] = doubleVal($disk_size["price_tiremount"]);
                $disk_sizes[$k] = $disk_size;
            }

            $calcValues = new \stdClass();
            $calcValues->car_colors = $car_colors;
            $calcValues->disk_colors = $disk_colors;
            $calcValues->disk_color_sections = $disk_color_sections;
            $calcValues->disk_sizes = $disk_sizes;

            return $calcValues;
        });

        $uslugi = Cache::remember('hp_uslugi', $minutes, function () {
            return DiskUslugi::orderBy("sort", "ASC")->get();
        });

        $colorGallery = Cache::remember('hp_gallery', $minutes, function () {
            return DiskGallery::whereNotNull('calc_color_id')->take(12)->get();
        });

        $feedback = Cache::remember('hp_feedback', $minutes, function () {
            return Feedback::take(12)->get();
        });

        return view(
            "pages.home",
            compact(
                "calcValues",
                "uslugi",
                "colorGallery",
                "feedback"
            )
        );
    }

    public function price()
    {
        $minutes = 10;

        $transp = Cache::remember('price_list', $minutes, function () {
            return $this->getPrices();
        });

        //dd($transp);
        return view("pages.price", compact('prices', 'transp'));
    }

    public function uslugi()
    {
        $uslugi = DiskUslugi::orderBy("sort", "ASC")->get();
        return view("pages.uslugi", compact('uslugi'));
    }

    public function uslugiDetail($slug)
    {
        if ($slug != "") {
            $usluga = DiskUslugi::where('slug', $slug)->first();
            if ($usluga) {
                $minutes = 10;

                $transp = Cache::remember('price_list', $minutes, function () {
                    return $this->getPrices();
                });

                $gallery = DiskGallery::where("disk_uslugi_id", $usluga->id)->take(12)->get();

                return view("pages.uslugi-detail", compact('usluga', 'transp', 'gallery'));
            }
        }
    }

    public function gallery(Request $request)
    {

        $page = $request->has("page") ? intval($request->get("page")) : 0;
        $service_id = $request->has("service_id") ? intval($request->get("service_id")) : 0;
        $color_id = $request->has("color_id") ? $request->get("color_id") : "";

        // Get Color Options
        $DT_calc_disk_colors = DataType::where("name", "calc_disk_colors")->with("rows")->first();
        $sectionRow = $DT_calc_disk_colors->rows->where("field", "section")->first();
        $sectionOptions = json_decode($sectionRow->details, true);
        $disk_color_sections_options = isset($sectionOptions["options"]) ? $sectionOptions["options"] : [];

        if ($service_id == 0) {
            $usluga = DiskUslugi::orderBy('sort', 'ASC')->first();
            $service_id = $usluga->id;
        }

        $availableColorIds = DiskGallery::where('disk_uslugi_id', $service_id)->groupBy('calc_color_id')->pluck('calc_color_id')->toArray();
        $availableColorSections = CalcDiskColor::whereIn('id', $availableColorIds)->groupBy('section')->pluck('section')->toArray();

        if ($color_id == '' && !empty($availableColorSections)) {
            $color_id = array_first($availableColorSections);
        }

        $qBuilder = DiskGallery::where('disk_uslugi_id', $service_id);

        if ($color_id != "") {
            $qBuilder->colorSection($color_id);
        }

        //dd($qBuilder->toSql());

        $galleryList = $qBuilder->paginate(24);

        $serviceList = DiskUslugi::all();

        $colorList = [];
        foreach ($disk_color_sections_options as $key => $name) {
            if (in_array($key, $availableColorSections)) {
                $colorList[] = (object)["id" => $key, "name" => $name];
            }
        }

        if ($galleryList->count() == 0 && $page > 1) {
            return redirect(route("gallery", ["service_id" => $service_id, "color_id" => $color_id]));
        }

        //dd($availableColors);

        $filterData = [
            "page" => $page,
            "selectedService" => $service_id,
            "selectedColor" => $color_id,
            "serviceList" => $serviceList,
            "colorList" => collect($colorList)
        ];
        return view("pages.gallery", compact('galleryList', 'filterData'));
    }

    public function contacts()
    {
        return view("pages.contacts");
    }

    public function sendMail(Request $request) {
        $inp = $request->all();

        $val = Validator::make($request->all(), [
            "name" => "required|string",
            "phone" => [
                "required",
                function($attribute, $value, $fail) {
                    if (!preg_match("/\+\d\(\d{3}\)\d{3}-\d-\d{3}/", $value)) {
                        return $fail('не верный формат номера.');
                    }
                }
            ]
        ]);

        if ($val->fails()) {
            return response()->json(["success" => "FAIL", "data" => $inp, "errors" => $val->errors()]);
        } else {

            Mail::to(env("MAIL_TO_ADDRESS", "info@diskremont.ru"))
                ->send(new CallbackFormSubmitted($inp));

            if (count(Mail::failures()) > 0) {
                $errors = [];
                foreach (Mail::failures() as $email_address) {
                    $errors["mail"] = "Письмо не отправлено по адресу " . $email_address;
                }
                return response()->json(["success" => "FAIL", "data" => $inp, "errors" => $errors]);
            }

            return response()->json(["success" => "OK", "data" => $inp]);
        }
    }

    public function sendOrder(Request $request) {
        $inp = $request->all();

        $val = Validator::make($request->all(), [
            "client_name" => "required|string",
            "client_phone" => [
                "required",
                function($attribute, $value, $fail) {
                    if (!preg_match("/\+\d\(\d{3}\)\d{3}-\d-\d{3}/", $value)) {
                        return $fail('не верный формат номера.');
                    }
                }
            ],
            "car_color" => "required",
            "disk_color" => "required",
            "disk_polished" => "required",
            "disk_size" => "required",
            "tire_mount" => "required",
            "total" => "required"
        ]);

        if ($val->fails()) {
            return response()->json(["success" => "FAIL", "data" => $inp, "errors" => $val->errors()]);
        } else {

            Mail::to(env("MAIL_TO_ADDRESS", "info@diskremont.ru"))
                ->send(new CalcFormSubmitted($inp));

            if (count(Mail::failures()) > 0) {
                $errors = [];
                foreach (Mail::failures() as $email_address) {
                    $errors["mail"] = "Письмо не отправлено по адресу " . $email_address;
                }
                return response()->json(["success" => "FAIL", "data" => $inp, "errors" => $errors]);
            }

            return response()->json(["success" => "OK", "data" => $inp]);
        }
    }
}
