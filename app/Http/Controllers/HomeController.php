<?php

namespace App\Http\Controllers;

use App\CalcCarColor;
use App\CalcDiskColor;
use App\CalcDiskSize;
use App\DiskUslugi;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataType;

class HomeController extends Controller
{
    public function index() {

        // Calc Data
        $car_colors = CalcCarColor::select(["name", "value_16 as hash", "body_render_img"])->orderBy("sort", "ASC")->get()->toArray();
        foreach ($car_colors as $k=>$car_color) {
            $car_color["hash"] = preg_replace('/^#/', '', $car_color["hash"]);
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
        foreach ($disk_colors as $k=>$disk_color) {
            $disk_color["hash"] = preg_replace('/^#/', '', $disk_color["hash"]);
            $disk_colors[$k] = $disk_color;
        }

        $disk_sizes = CalcDiskSize::select(["size", "price", "price_grind", "price_tiremount"])->get()->toArray();
        foreach ($disk_sizes as $k=>$disk_size) {
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

        return view(
            "pages.home",
            compact(
                "calcValues"
            )
        );
    }

    public function price() {
        return view( "pages.price");
    }

    public function uslugi() {
        $uslugi = DiskUslugi::all();
        return view( "pages.uslugi", compact('uslugi'));
    }

    public function gallery() {
        return view( "pages.gallery");
    }

    public function contacts() {
        return view( "pages.contacts");
    }

    public function uslugiDetail($slug) {
        if ($slug != "") {
            $usluga = DiskUslugi::where('slug', $slug)->first();
            if ($usluga) {
                return view( "pages.uslugi-detail", compact('usluga'));
            }
        }
    }
}
