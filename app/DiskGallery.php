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
}
