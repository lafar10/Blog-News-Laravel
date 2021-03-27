<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['id', 'category_name_en', 'category_name_ar'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'category_id', 'id');
    }
}
