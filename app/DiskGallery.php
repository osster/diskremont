<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Resizable;


class DiskGallery extends Model
{
    use SoftDeletes;
    use Resizable;

    protected $table = "disk_gallery";

    public function color() {
        return $this->hasMany(CalcDiskColor::class, "id", "calc_color_id");
    }

    public function usluga() {
        return $this->hasMany(DiskUslugi::class, "disk_uslugi_id");
    }

    public function scopeColorSection($query, $sectionKey)
    {
        return $query->join("calc_disk_colors", "calc_disk_colors.id", "=", "calc_color_id")
            ->where('calc_disk_colors.section', $sectionKey)
            ->select(["disk_gallery.*"]);
    }
}
