<?php

namespace Railken\LaraOre\Schedule\Attributes\WorkId;

use Railken\Laravel\Manager\Attributes\BelongsToAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class WorkIdAttribute extends BelongsToAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'work_id';

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
        Tokens::NOT_DEFINED    => Exceptions\ScheduleWorkIdNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\ScheduleWorkIdNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\ScheduleWorkIdNotAuthorizedException::class,
        Tokens::NOT_UNIQUE     => Exceptions\ScheduleWorkIdNotUniqueException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'schedule.attributes.work_id.fill',
        Tokens::PERMISSION_SHOW => 'schedule.attributes.work_id.show',
    ];

    /**
     * Retrieve the name of the relation.
     *
     * @return string
     */
    public function getRelationName()
    {
        return 'work';
    }

    /**
     * Retrieve eloquent relation.
     *
     * @param \Railken\LaraOre\Schedule\Schedule $entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getRelationBuilder(EntityContract $entity)
    {
        return $entity->work();
    }

    /**
     * Retrieve relation manager.
     *
     * @param \Railken\LaraOre\Schedule\Schedule $entity
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getRelationManager(EntityContract $entity)
    {
        return new \Railken\LaraOre\Work\WorkManager($this->getManager()->getAgent());
    }
}
