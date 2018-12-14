<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'vp_categories';
    protected $fillable = [
        'cate_name','cate_slug'
    ];
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
    public function Category()
    {
    	return $this->hasMany('App\Models\Product', 'cate_id', 'pro_cate');
    }
}
