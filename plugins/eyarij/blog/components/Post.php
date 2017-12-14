<?php namespace Eyarij\Blog\Components;

use Cms\Classes\ComponentBase;
use Eyarij\Blog\Models\Article;
use Eyarij\Blog\Models\Category;
class Post extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Post Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    function onRun()
    {
        $article = Article::where('slug','=',$this->param('slug'))->first();
        if (!$article) {
            return $this->controller->run('404');
        }
        $this->page['post'] = $article;
        $category_id = Article::where('slug','=',$this->param('slug'))->value('category_id');
        $category = Category::where('id','=',$category_id)->first();
        $this->page['categories'] = $category;
    }
}
