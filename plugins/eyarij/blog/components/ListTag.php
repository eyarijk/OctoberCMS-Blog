<?php namespace Eyarij\Blog\Components;

use Cms\Classes\ComponentBase;

class ListTag extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ListTag Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $this->page['name'] = $this->param('slug');
    }
}
