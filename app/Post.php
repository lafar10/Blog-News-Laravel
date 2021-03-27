<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ['id', 'author_name', 'post_title_en', 'post_subtitle_en', 'action_map_en', 'source_of_post_en', 'category_name_ar', 'category_name_en', 'category_id', 'views', 'big_picture', 'big_video', 'big_title_en', 'content_intro_en', 'content_show_en', 'content_show_picture', 'content_show_video', 'content_conclusion_en', 'content_conclusion_picture', 'content_conclusion_video', 'author_name_ar', 'post_title_ar', 'post_subtitle_ar', 'action_map_ar', 'source_of_post_ar', 'big_title_ar', 'content_intro_ar', 'content_show_ar', 'content_conclusion_ar', 'big_post_etat', 'emergency', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
