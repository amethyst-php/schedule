<?php

namespace Railken\LaraOre\Schedule\Attributes\Enabled;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class EnabledAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'enabled';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = false;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\ScheduleEnabledNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ScheduleEnabledNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ScheduleEnabledNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\ScheduleEnabledNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'schedule.attributes.enabled.fill',
        Tokens::PERMISSION_SHOW => 'schedule.attributes.enabled.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return $value === 1 || $value === 0 || $value === true || $value === false;
    }
}
