<?php namespace Depcore\Blogpreview\FormWidgets;

use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;
use Backend\Classes\FormWidgetBase;

/**
 * BlogPreview Form Widget
 */
class BlogPreview extends FormWidgetBase
{
    public $replacePreviewButton = false;

    protected $defaultAlias = 'blogPreview';

    public function init()
    {
        $this->fillFromConfig([
            'replacePreviewButton'
        ]);
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('blogpreview');
    }

    public function prepareVars()
    {
        $this->vars['replacePreviewButton'] = $this->replacePreviewButton;

        $this->vars['iconSrc'] = $this->assetPath.'/images/icon.png';
        $this->vars['iconLink'] = 'https://octobercms.com/plugin/depcore-blogpreview';

        $pageName = '';
        $cmsPage = '';
        $properties = '';

        $theme = Theme::getActiveTheme();
        $pages = CmsPage::listInTheme($theme, true);

        foreach ($pages as $page) {
            if (!$page->hasComponent('blogPost')) continue;

            $properties = $page->getComponentProperties('blogPost');

            if (!isset(  $properties['slug']) ) continue;
            $pageName = strtolower($page->fileName);
            $cmsPage = $page;
        }

        $slug = preg_replace("/[^A-Za-z0-9:?!]/",'',$properties['slug']);
        $pageUrl = str_replace($slug, '', $cmsPage->attributes['url']);

        if (isset($this->model->attributes['slug'])) {
            $this->vars['pagePreviewUrl'] = $pageUrl . $this->model->attributes['slug'];
        }
        else $this->vars['pagePreviewUrl'] = '';

    }

    protected function loadAssets()
    {
        $this->addCss('css/pagepreview.css', 'core');
        $this->addJs('js/pagepreview.js', 'core');
    }

}
