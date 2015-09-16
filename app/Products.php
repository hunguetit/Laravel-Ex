<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','modelNo', 'price', 'description', 'category_id', 'brand','quantityInStock', 'sale', 'timeSale'];

    protected $hidden = ['remember_token'];
}
