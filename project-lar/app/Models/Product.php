<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'vp_products';
    protected $fillable = [
        'prod_name','prod_slug','prod_price'
    ];
    protected $primaryKey = 'prod_id';
    protected $guarded = [];

    public function Product()
    {
        return $this->belongsTo('App\Models\Category', 'prod_cate', 'cate_id');
    }
}
