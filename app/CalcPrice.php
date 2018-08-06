<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CalcPrice extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
