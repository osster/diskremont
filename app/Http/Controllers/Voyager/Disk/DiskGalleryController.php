<?php
namespace App\Http\Controllers\Voyager\Disk;

use App\CalcDiskColor;
use App\DiskUslugi;
use App\Http\Controllers\Voyager\VoyagerBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Facades\Voyager;

class DiskGalleryController extends VoyagerBaseController
{
    public function getData(Request $request)
    {
        $colors = CalcDiskColor::all();
        $services = DiskUslugi::all();

        return response()->json(["success" => "OK", "data" => [
            "colors" => $colors,
            "services" => $services
        ]]);
    }
}