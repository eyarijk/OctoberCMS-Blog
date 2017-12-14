<?php namespace Eyarij\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('eyarij_blog_tags', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('position')->nullable();
            $table->boolean('show_content')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eyarij_blog_tags');
    }
}
