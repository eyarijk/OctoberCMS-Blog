<?php namespace Eyarij\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTagsTable extends Migration
{
    public function up()
    {
        Schema::create('eyarij_blog_articles_tags', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('eyarij_blog_articles')->onDelete('cascade');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('eyarij_blog_tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('eyarij_blog_articles_tags');
    }
}
