<?php namespace Depcore\Blogpreview;

use Event;
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
            'icon'        => 'icon-eye'
        ];
    }

    public function boot()
    {
        Event::listen('backend.form.extendFields', function($widget) {
            if (!($widget->getController() instanceof \RainLab\Blog\Controllers\Posts and $widget->model instanceof \RainLab\Blog\Models\Post)

                || $widget->isNested) {
                return;
            }

            $widget->addFields([
                '_blogpreview' => [
                    'type'                 => 'Depcore\Blogpreview\FormWidgets\BlogPreview',
                    'cssClass'             => 'collapse-visible',
                    'replacePreviewButton' => true
                ]
            ]);

        });

    }

    public function registerFormWidgets()
    {
        return [
            'Depcore\Blogpreview\FormWidgets\BlogPreview' => 'blogpreview'
        ];
    }

}
