<?php

namespace Railken\LaraOre\Schedule\Exceptions;

class ScheduleNotAuthorizedException extends ScheduleException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'SCHEDULE_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
