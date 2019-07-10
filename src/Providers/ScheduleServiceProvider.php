<?php

namespace Amethyst\Providers;

use Amethyst\Common\CommonServiceProvider;
use Amethyst\Console\Commands\ScheduleFireCommand;
use Amethyst\Managers\ScheduleManager;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class ScheduleServiceProvider extends CommonServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();

        $this->commands([ScheduleFireCommand::class]);

        if ($this->app->runningInConsole()) {
            $this->app->booted(function () {
                if (Schema::hasTable(Config::get('amethyst.schedule.data.schedule.table'))) {
                    $schedule = $this->app->make(Schedule::class);

                    $m = new ScheduleManager();

                    /** @var \Amethyst\Repositories\ScheduleRepository */
                    $repository = $m->getRepository();

                    foreach ($repository->findAllEnabled() as $s) {
                        $schedule->command('amethyst:schedule:fire', [$s->id])->cron($s->cron);
                    }
                }
            });
        }
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Amethyst\Providers\WorkServiceProvider::class);
    }
}
