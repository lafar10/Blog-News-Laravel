<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('author_name');
            $table->string('post_title');
            $table->string('post_subtitle');
            $table->string('big_picture');
            $table->string('big_video');
            $table->string('big_title');
            $table->text('content_intro');
            $table->text('content_show');
            $table->string('content_show_picture');
            $table->string('content_show_video');
            $table->string('content_conclusion');
            $table->string('content_conclusion_picture');
            $table->string('content_conclusion_video');
            $table->string('category_id');
            $table->string('action_place');
            $table->string('source_of_post');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
