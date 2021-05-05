<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDataTypesValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('data_types')->where('name','calc_disk_colors')->update(['controller'=>'App\Http\Controllers\Voyager\Disk\CalcDiskColorController']);
        DB::table('data_types')->where('name','calc_car_colors')->update(['controller'=>'App\Http\Controllers\Voyager\Disk\CalcPicturesController']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
