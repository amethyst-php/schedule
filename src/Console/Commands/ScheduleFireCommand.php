<?php

namespace Railken\LaraOre\Console\Commands;

use Illuminate\Console\Command;
use Railken\LaraOre\Schedule\ScheduleManager;
use Railken\LaraOre\Work\WorkManager;

class ScheduleFireCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ore:schedule:fire {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fire ore-schedule';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sm = new ScheduleManager();
        $wm = new WorkManager();
        
        $resource = $sm->getRepository()->findOneById((int) $this->argument('id'));

        if ($resource === null) {
            return $this->error('No schedule found given id');
        }

        $wm->dispatch($resource->work, []);
    }
}
