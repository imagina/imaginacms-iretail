<?php

namespace Modules\Iretail\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Iretail\Listeners\RegisterIretailSidebar;

class IretailServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIretailSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });


    }

    public function boot()
    {
       
        $this->publishConfig('iretail', 'config');
        $this->publishConfig('iretail', 'crud-fields');

        $this->mergeConfigFrom($this->getModuleConfigFilePath('iretail', 'settings'), "asgard.iretail.settings");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('iretail', 'settings-fields'), "asgard.iretail.settings-fields");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('iretail', 'permissions'), "asgard.iretail.permissions");

        //$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Iretail\Repositories\ItemRepository',
            function () {
                $repository = new \Modules\Iretail\Repositories\Eloquent\EloquentItemRepository(new \Modules\Iretail\Entities\Item());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iretail\Repositories\Cache\CacheItemDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Iretail\Repositories\TransactionRepository',
            function () {
                $repository = new \Modules\Iretail\Repositories\Eloquent\EloquentTransactionRepository(new \Modules\Iretail\Entities\Transaction());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iretail\Repositories\Cache\CacheTransactionDecorator($repository);
            }
        );
// add bindings


    }


}
