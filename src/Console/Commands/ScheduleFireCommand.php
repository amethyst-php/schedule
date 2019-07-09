<?php

namespace Amethyst\Console\Commands;

use Illuminate\Console\Command;
use Amethyst\Managers\ScheduleManager;
use Amethyst\Managers\WorkManager;
use Railken\Template\Generators;
use Symfony\Component\Yaml\Yaml;

class ScheduleFireCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amethyst:schedule:fire {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fire amethyst-schedule';

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
            $this->error('No schedule found given id');

            return;
        }

        $generator = new Generators\TextGenerator();

        $wm->dispatch($resource->work, Yaml::parse($generator->generateAndRender($resource->data, [])));
    }
}
