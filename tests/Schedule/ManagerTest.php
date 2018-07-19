<?php

namespace Railken\LaraOre\Tests\Schedule;

use Railken\LaraOre\Schedule\ScheduleFaker;
use Railken\LaraOre\Schedule\ScheduleManager;
use Railken\LaraOre\Support\Testing\ManagerTestableTrait;

class ManagerTest extends BaseTest
{
    use ManagerTestableTrait;

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new ScheduleManager();
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getManager(), ScheduleFaker::make()->parameters());
    }
}
