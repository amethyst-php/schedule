<?php

namespace Railken\Amethyst\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Railken\Amethyst\Common\CommonServiceProvider;
use Railken\Amethyst\Console\Commands\ScheduleFireCommand;
use Railken\Amethyst\Managers\ScheduleManager;

class ScheduleServiceProvider extends CommonServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();

        $this->commands([ScheduleFireCommand::class]);

        $this->app->booted(function () {
            if (Schema::hasTable(Config::get('amethyst.schedule.data.schedule.table'))) {
                $schedule = $this->app->make(Schedule::class);

                $m = new ScheduleManager();

                /** @var \Railken\Amethyst\Repositories\ScheduleRepository */
                $repository = $m->getRepository();

                foreach ($repository->findAllEnabled() as $s) {
                    $schedule->command('amethyst:schedule:fire', [$s->work->id])->cron($s->cron);
                }
            }
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Railken\Amethyst\Providers\WorkServiceProvider::class);
    }
}
