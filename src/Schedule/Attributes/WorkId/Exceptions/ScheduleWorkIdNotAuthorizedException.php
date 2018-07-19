<?php

namespace Railken\LaraOre\Schedule\Attributes\WorkId\Exceptions;

use Railken\LaraOre\Schedule\Exceptions\ScheduleAttributeException;

class ScheduleWorkIdNotAuthorizedException extends ScheduleAttributeException
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
    protected $code = 'SCHEDULE_WORK_ID_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
