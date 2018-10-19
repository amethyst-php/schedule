<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data
    |--------------------------------------------------------------------------
    |
    | Here you can change the table name and the class components.
    |
    */
    'data' => [
        'schedule' => [
            'table'      => 'amethyst_schedules',
            'comment'    => 'Schedule',
            'model'      => Railken\Amethyst\Models\Schedule::class,
            'schema'     => Railken\Amethyst\Schemas\ScheduleSchema::class,
            'repository' => Railken\Amethyst\Repositories\ScheduleRepository::class,
            'serializer' => Railken\Amethyst\Serializers\ScheduleSerializer::class,
            'validator'  => Railken\Amethyst\Validators\ScheduleValidator::class,
            'authorizer' => Railken\Amethyst\Authorizers\ScheduleAuthorizer::class,
            'faker'      => Railken\Amethyst\Fakers\ScheduleFaker::class,
            'manager'    => Railken\Amethyst\Managers\ScheduleManager::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Http configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the routes
    |
    */
    'http' => [
        'admin' => [
            'schedule' => [
                'enabled'     => true,
                'controller'  => Railken\Amethyst\Http\Controllers\Admin\SchedulesController::class,
                'router'      => [
                    'as'        => 'schedule.',
                    'prefix'    => '/schedules',
                ],
            ],
        ],
    ],
];
