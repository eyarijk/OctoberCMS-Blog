<?php namespace Eyarij\Blog\Components;

use Cms\Classes\ComponentBase;
use Eyarij\Blog\Models\Category;

class AllCategory extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'AllCategory Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $categories = Category::where('show_content','=','1')->paginate(20);
        if (!$categories) {
            return $this->controller->run('404');
        }
        $this->page['categories'] = $categories;

    }
}
