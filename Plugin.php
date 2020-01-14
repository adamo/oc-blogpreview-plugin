<?php namespace Depcore\Blogpreview;

use Backend;
use System\Classes\PluginBase;

/**
 * blogpreview Plugin Information File
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
            'name'        => 'depcore.blogpreview::lang.plugin.name',
            'description' => 'depcore.blogpreview::lang.plugin.description',
            'author'      => 'depcore',
            'icon'        => 'icon-leaf'
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
        return []; // Remove this line to activate

        return [
            'Depcore\Blogpreview\Components\MyComponent' => 'myComponent',
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
            'depcore.blogpreview.some_permission' => [
                'tab' => 'depcore.blogpreview::lang.plugin.name',
                'label' => 'depcore.blogpreview::lang.permissions.some_permission'
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
        return []; // Remove this line to activate

        return [
            'blogpreview' => [
                'label'       => 'depcore.blogpreview::lang.plugin.name',
                'url'         => Backend::url('depcore/blogpreview/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['depcore.blogpreview.*'],
                'order'       => 500,
            ],
        ];
    }

}
