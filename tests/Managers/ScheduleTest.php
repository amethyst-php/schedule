<?php

namespace Amethyst\Tests\Managers;

use Amethyst\Fakers\ScheduleFaker;
use Amethyst\Managers\ScheduleManager;
use Amethyst\Tests\BaseTest;
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
