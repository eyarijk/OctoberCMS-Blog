<?php namespace Eyarij\Blog\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Articles Back-end Controller
 */
class Articles extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController'

    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Eyarij.Blog', 'blog', 'articles');
    }
}
