<?php
namespace App\Http\Controllers\Voyager\Disk;

use App\CalcDiskColor;
use App\DiskUslugi;
use App\Http\Controllers\Voyager\VoyagerBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;

class CalcPicturesController extends VoyagerBaseController
{

    private function img64decode($bsf) {
        $iData = null;

        if (preg_match('/^data:image\/(\w+);base64,/', $bsf, $type)) {
            $data = substr($bsf, strpos($bsf, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }

            $iData = base64_decode($data);

            if ($iData === false) {
                throw new \Exception('base64_decode failed');
            }
        } else {
            throw new \Exception('did not match data URI with image data');
        }

        return $iData;
    }

    private function imgOpt($img_path) {
        $im = new Imagick();
        $im->readImage($img_path);
        $im->stripImage();
        $im->setImageColorSpace(Imagick::COLORSPACE_SRGB);
        $im->adaptiveResizeImage($xres*2,$yres*2);
        $im->setImageCompressionQuality($hiq);
        $im->setSamplingFactors(array('2x2', '1x1', '1x1'));
        $image1=$im->getImageBlob();
        $im->setInterlaceScheme(Imagick::INTERLACE_PLANE);
        $image2=$im->getImageBlob();
        if(strlen($image1)>strlen($image2)) {
            file_put_contents($outfile2,$image2);
        } else {
            file_put_contents($outfile2,$image1);
        };
        $im->clear();
        $im->destroy();

    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {

            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);


            $arData = $data->toArray();

            // Replace Base 64 Image To PNG Path
            if (
                isset($arData["wheel_img"]) ||
                isset($arData["wheel_polished_img"]) ||
                isset($arData["body_render_img"])
            )
            {
                if(isset($arData["wheel_img"])) {
                    $img = $this->img64decode($data->wheel_img);

                    Storage::disk('local')->put("public/calc/disk/wheel_img_{$id}.png", $img);

                    $data->wheel_img = "calc/disk/wheel_img_{$id}.png";
                    $data->save();
                }

                if(isset($arData["wheel_polished_img"])) {
                    $img = $this->img64decode($data->wheel_polished_img);

                    Storage::disk('local')->put("public/calc/disk/wheel_polished_img_{$id}.png", $img);

                    $data->wheel_polished_img = "calc/disk/wheel_polished_img_{$id}.png";
                    $data->save();
                }

                if(isset($arData["body_render_img"])) {
                    $img = $this->img64decode($data->body_render_img);

                    Storage::disk('local')->put("public/calc/car/body_render_img_{$id}.png", $img);

                    $data->body_render_img = "calc/car/body_render_img_{$id}.png";
                    $data->save();
                }

            }

            // try to save PRICE
            if ($request->has('price')) {
                try {
                    if ($data->price->count() > 0) {
                        $item = $data->price->first();
                        $item->price = $request->get("price");
                        $item->save();
                    } else {
                        $data->price()->create(["price" => $request->get("price")]);
                    }
                    //dd([$data->price, $request->get("price")]);
                } catch (\ErrorException $e) {
                    //dd($e->getMessage());
                    Log::error($e->getMessage());
                }
            }

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }


    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->has('_validate')) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            $arData = $data->toArray();

            // Replace Base 64 Image To PNG Path
            if (
                isset($arData["wheel_img"]) ||
                isset($arData["wheel_polished_img"]) ||
                isset($arData["body_render_img"])
            )
            {
                if(isset($arData["wheel_img"])) {
                    $img = $this->img64decode($data->wheel_img);

                    Storage::disk('local')->put("public/calc/disk/wheel_img_{$data->id}.png", $img);

                    $data->wheel_img = "calc/disk/wheel_img_{$data->id}.png";
                    $data->save();
                }

                if(isset($arData["wheel_polished_img"])) {
                    $img = $this->img64decode($data->wheel_polished_img);

                    Storage::disk('local')->put("public/calc/disk/wheel_polished_img_{$data->id}.png", $img);

                    $data->wheel_polished_img = "calc/disk/wheel_polished_img_{$data->id}.png";
                    $data->save();
                }

                if(isset($arData["body_render_img"])) {
                    $img = $this->img64decode($data->body_render_img);

                    Storage::disk('local')->put("public/calc/car/body_render_img_{$data->id}.png", $img);

                    $data->body_render_img = "calc/car/body_render_img_{$data->id}.png";
                    $data->save();
                }
            }

            //dd($data->fresh()->toArray());

            event(new BreadDataAdded($dataType, $data));

            if ($request->ajax()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }
}