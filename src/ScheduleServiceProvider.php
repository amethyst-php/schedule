<?php

namespace Railken\LaraOre;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Railken\LaraOre\Api\Support\Router;
use Railken\LaraOre\Schedule\ScheduleManager;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/ore.schedule.php' => config_path('ore.schedule.php')], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutes();

        config(['ore.permission.managers' => array_merge(Config::get('ore.permission.managers', []), [
            //\Railken\LaraOre\Schedule\ScheduleManager::class,
        ])]);

        $this->app->booted(function () {
            if (Schema::hasTable(Config::get('ore.schedule.table'))) {
                $schedule = $this->app->make(Schedule::class);

                $m = new ScheduleManager();

                /** @var \Railken\LaraOre\Schedule\ScheduleRepository */
                $repository = $m->getRepository();

                foreach ($repository->findAllEnabled() as $s) {
                    $schedule->command('lara-ore:work:fire', [$s->work->id])->cron($s->cron);
                }
            }
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ApiServiceProvider::class);
        $this->app->register(\Railken\LaraOre\WorkServiceProvider::class);
        $this->mergeConfigFrom(__DIR__.'/../config/ore.schedule.php', 'ore.schedule');
    }

    /**
     * Load routes.
     */
    public function loadRoutes()
    {
        if (Config::get('ore.schedule.http.admin.enabled')) {
            Router::group(Config::get('ore.schedule.http.admin.router'), function ($router) {
                $controller = Config::get('ore.schedule.http.admin.controller');

                $router->get('/', ['uses' => $controller.'@index']);
                $router->post('/', ['uses' => $controller.'@create']);
                $router->put('/{id}', ['uses' => $controller.'@update']);
                $router->delete('/{id}', ['uses' => $controller.'@remove']);
                $router->get('/{id}', ['uses' => $controller.'@show']);
            });
        }
    }
}
