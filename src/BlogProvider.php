<?php

namespace Carawebs\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Collective\Html\HtmlServiceProvider;

class BlogProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'blog');


        $this->app->register(HtmlServiceProvider::class);
        // $loader = AliasLoader::getInstance();
        // $loader->alias('Form', '\Collective\Html\FormFacade');
        AliasLoader::getInstance(['Form'=>'\Collective\Html\FormFacade']);


        // $this->mergeConfigFrom(__DIR__.'/config/blog.php', 'blog.providers');
        // $this->mergeConfigFrom(__DIR__.'/config/blog.php', 'blog.aliases');
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
