<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('category');
            $table->string('category_id');
            $table->string('category_seo_description');
            $table->string('category_seo_name');
//            $table->string('image');
            $table->string('seo_description');
            $table->string('seo_name');
            $table->string('seo_title');
            $table->string('type'); // breaking news, exclusive, live, and so on
            $table->string('is_main'); // is it in the four main news?
            $table->string('is_in_five'); // is it in the five secondary news?
            $table->text('content'); // the body of the news
//            $table->string('tags'); // the tags of the news
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
        Schema::dropIfExists('news');
    }
}
