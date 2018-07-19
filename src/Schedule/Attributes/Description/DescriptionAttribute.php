<?php

namespace Railken\LaraOre\Schedule\Attributes\Description;

use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;
use Respect\Validation\Validator as v;

class DescriptionAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'description';

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
        Tokens::NOT_DEFINED    => Exceptions\ScheduleDescriptionNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ScheduleDescriptionNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ScheduleDescriptionNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\ScheduleDescriptionNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'schedule.attributes.description.fill',
        Tokens::PERMISSION_SHOW => 'schedule.attributes.description.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param \Railken\Laravel\Manager\Contracts\EntityContract $entity
     * @param mixed                                             $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return v::length(1, 1024)->validate($value);
    }
}
