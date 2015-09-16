<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productSize extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productSize';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','product_id'];
}
