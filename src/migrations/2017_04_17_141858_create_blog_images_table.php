<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogimagesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('blog_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->string('title');
            $table->text('alt');
            $table->text('description');
            $table->string('filePath');
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
        Schema::drop('blog_images');
    }
}
