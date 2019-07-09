<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class ScheduleAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'schedule.create',
        Tokens::PERMISSION_UPDATE => 'schedule.update',
        Tokens::PERMISSION_SHOW   => 'schedule.show',
        Tokens::PERMISSION_REMOVE => 'schedule.remove',
    ];
}
