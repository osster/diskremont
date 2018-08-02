<?php

namespace App\Http\Controllers;

use App\CalcCarColor;
use App\CalcDiskColor;
use App\CalcDiskSize;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        // Calc Data
        $car_colors = CalcCarColor::select(["name", "value_16 as hash", "body_render_img"])->get()->toArray();
        foreach ($car_colors as $k=>$car_color) {
            $car_color["hash"] = preg_replace('/^#/', '', $car_color["hash"]);
            $car_colors[$k] = $car_color;
        }
        $disk_colors = CalcDiskColor::select(["name", "value_16 as hash", "rate", "wheel_img", "wheel_polished_img"])->get()->toArray();
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
        $calcValues->disk_sizes = $disk_sizes;

        return view(
            "pages.home",
            compact(
                "calcValues"
            )
        );
    }
}
