<?php

namespace Railken\LaraOre\Schedule;

use Illuminate\Support\Facades\Config;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class ScheduleManager extends ModelManager
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Schedule::class;

    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Description\DescriptionAttribute::class,
        Attributes\Enabled\EnabledAttribute::class,
        Attributes\Cron\CronAttribute::class,
        Attributes\WorkId\WorkIdAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\ScheduleNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->entity = Config::get('ore.schedule.entity');
        $this->attributes = array_merge($this->attributes, array_values(Config::get('ore.schedule.attributes')));

        $classRepository = Config::get('ore.schedule.repository');
        $this->setRepository(new $classRepository($this));

        $classSerializer = Config::get('ore.schedule.serializer');
        $this->setSerializer(new $classSerializer($this));

        $classAuthorizer = Config::get('ore.schedule.authorizer');
        $this->setAuthorizer(new $classAuthorizer($this));

        $classValidator = Config::get('ore.schedule.validator');
        $this->setValidator(new $classValidator($this));

        parent::__construct($agent);
    }
}
