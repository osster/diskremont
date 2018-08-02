<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CalcPrice extends Model
{
    protected $fillable = ["price"];

    public $timestamps = false;

    /**
     * Get all of the owning commentable models.
     */
    public function priceable()
    {
        return $this->morphTo();
    }
}
