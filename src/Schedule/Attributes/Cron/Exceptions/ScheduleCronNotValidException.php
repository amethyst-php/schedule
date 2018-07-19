<?php

namespace Railken\LaraOre\Schedule\Attributes\Cron\Exceptions;

use Railken\LaraOre\Schedule\Exceptions\ScheduleAttributeException;

class ScheduleCronNotValidException extends ScheduleAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'cron';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'SCHEDULE_CRON_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
