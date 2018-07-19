<?php

namespace Railken\LaraOre\Schedule\Exceptions;

class ScheduleNotFoundException extends ScheduleException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'SCHEDULE_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
