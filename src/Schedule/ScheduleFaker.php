<?php

namespace Railken\LaraOre\Schedule;

use Faker\Factory;
use Railken\Bag;
use Railken\LaraOre\Work\WorkFaker;
use Railken\Laravel\Manager\BaseFaker;

class ScheduleFaker extends BaseFaker
{
    /**
     * @var string
     */
    protected $manager = ScheduleManager::class;

    /**
     * @return \Railken\Bag
     */
    public function parameters()
    {
        $faker = Factory::create();

        $bag = new Bag();
        $bag->set('name', $faker->name);
        $bag->set('description', $faker->text);
        $bag->set('enabled', 1);
        $bag->set('cron', '* * * * *');
        $bag->set('work', WorkFaker::make()->parameters()->toArray());

        return $bag;
    }
}
