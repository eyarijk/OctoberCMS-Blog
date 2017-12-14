<?php namespace Eyarij\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('eyarij_blog_categories', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('position')->nullable();
            $table->string('show_content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eyarij_blog_categories');
    }
}
