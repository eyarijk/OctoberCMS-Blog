<?php namespace Eyarij\Blog\Components;

use Cms\Classes\ComponentBase;
use Eyarij\Blog\Models\Article;
use Eyarij\Blog\Models\Category;

class ListCategory extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ListCategory Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $category_id = Category::where('slug','=',$this->param('slug'))->value('id');
        if (!$category_id) {
            return $this->controller->run('404');
        }
        $this->page['posts'] = Article::where('category_id','=',$category_id)->paginate(5);
    }
}
