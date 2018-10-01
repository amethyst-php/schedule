<?php

namespace Railken\Amethyst\Fakers;

use Faker\Factory;
use Railken\Bag;
use Railken\Lem\Faker;

class ScheduleFaker extends Faker
{
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
