<?php namespace Eyarij\Blog\Components;

use Cms\Classes\ComponentBase;
use Eyarij\Blog\Models\Tag;

class AllTag extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'AllTag Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $tags = Tag::where('show_content','=','1')->paginate(20);
        if (!$tags) {
            return $this->controller->run('404');
        }
        $this->page['tags'] = $tags;
    }
}
