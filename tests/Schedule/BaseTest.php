<?php

namespace Railken\LaraOre\Tests\Schedule;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\ScheduleServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
        //$this->artisan('vendor:publish', ['--provider' => 'Railken\LaraOre\ScheduleServiceProvider', '--force' => true]);
        $this->artisan('migrate');
    }
}
