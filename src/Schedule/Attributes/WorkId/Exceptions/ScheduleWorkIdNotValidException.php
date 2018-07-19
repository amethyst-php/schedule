<?php

namespace Railken\LaraOre\Schedule\Attributes\WorkId\Exceptions;

use Railken\LaraOre\Schedule\Exceptions\ScheduleAttributeException;

class ScheduleWorkIdNotValidException extends ScheduleAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'work_id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'SCHEDULE_WORK_ID_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
