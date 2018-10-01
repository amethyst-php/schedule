<?php

namespace Railken\Amethyst\Tests\Managers;

use Railken\Amethyst\Fakers\ScheduleFaker;
use Railken\Amethyst\Managers\ScheduleManager;
use Railken\Amethyst\Tests\BaseTest;
use Railken\Lem\Support\Testing\TestableBaseTrait;

class ScheduleTest extends BaseTest
{
    use TestableBaseTrait;

    /**
     * Manager class.
     *
     * @var string
     */
    protected $manager = ScheduleManager::class;

    /**
     * Faker class.
     *
     * @var string
     */
    protected $faker = ScheduleFaker::class;
}
