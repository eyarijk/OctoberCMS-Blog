<?php namespace Eyarij\Blog;

use Backend;
use System\Classes\PluginBase;

/**
 * blog Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'blog',
            'description' => 'No description provided yet...',
            'author'      => 'eyarij',
            'icon'        => 'icon-coffee'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Eyarij\Blog\Components\Articles' => 'articles',
            'Eyarij\Blog\Components\Post' => 'post',
            'Eyarij\Blog\Components\ListCategory' => 'listCategory',
            'Eyarij\Blog\Components\AllCategory' => 'allCategory',
            'Eyarij\Blog\Components\AllTag' => 'allTag',
            'Eyarij\Blog\Components\ListTag' => 'listTag',
            'Eyarij\Blog\Components\SendAdmin' => 'contact',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'eyarij.blog.some_permission' => [
                'tab' => 'blog',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'blog' => [
                'label'       => 'blog',
                'url'         => Backend::url('eyarij/blog/articles'),
                'icon'        => 'icon-coffee',
                'order'       => 500,
                'sideMenu' => [
                    'articles' => [
                        'label'       => 'Статьи',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('eyarij/blog/articles'),
                    ],
                    'categories' => [
                        'label'       => 'Категории',
                        'icon'        => 'icon-align-justify',
                        'url'         => \Backend::url('eyarij/blog/categories'),
                    ],
                    'tags' => [
                        'label'       => 'Теги',
                        'icon'        => 'icon-stack-overflow',
                        'url'         => \Backend::url('eyarij/blog/tags'),
                    ],
                    'contacts' => [
                        'label'       => 'Обратная связь',
                        'icon'        => 'icon-comment',
                        'url'         => \Backend::url('eyarij/blog/contacts'),
                    ]


                ]
            ],
        ];
    }
}
