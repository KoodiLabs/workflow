<?php

namespace Koodilabs\Workflow;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Koodilabs\Workflow\Commands\ThemeGenerate;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

/**
* Class WorkflowserviceProvider
*
* @package Koodilabls\Workflow
*/
class WorkflowServiceProvider extends ServiceProvider
{

    /**
     * @{inheritDoc}
     */
    public function boot()
    {
        $this->bootThemeConfig();
    }

    private function bootThemeConfig()
    {
        $this->publishes([
            __DIR__.'/../config/theme.php' => config_path('koodilabls/theme.php')
        ]);
    }

    /**
     * @{inheritDoc}
     */
    public function register()
    {
        $this->registerTheme();

        $this->commands(
            'koodilabs.theme.generate'
        );
    }

    private function registerTheme()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/theme.php', 'koodilabs.workflow.theme');

        $this->app['koodilabs.theme.generate'] = $this->app->share(function() {
            $adapterThemeStorage = new Local(Config::get('koodilabs.workflow.theme.theme_files'));
            $themeFilesystem = new Filesystem($adapterThemeStorage);

            return new ThemeGenerate(
                new ThemeManager($themeFilesystem)
            );
        });
    }
}