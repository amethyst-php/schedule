<?php

namespace Railken\LaraOre\Schedule\Attributes\Description\Exceptions;

use Railken\LaraOre\Schedule\Exceptions\ScheduleAttributeException;

class ScheduleDescriptionNotUniqueException extends ScheduleAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'description';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'SCHEDULE_DESCRIPTION_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
