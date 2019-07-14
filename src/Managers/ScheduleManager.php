<?php

namespace Amethyst\Managers;

use Amethyst\Common\ConfigurableManager;
use Railken\Lem\Manager;

/**
 * @method \Amethyst\Models\Schedule newEntity()
 * @method \Amethyst\Schemas\ScheduleSchema getSchema()
 * @method \Amethyst\Repositories\ScheduleRepository getRepository()
 * @method \Amethyst\Serializers\ScheduleSerializer getSerializer()
 * @method \Amethyst\Validators\ScheduleValidator getValidator()
 * @method \Amethyst\Authorizers\ScheduleAuthorizer getAuthorizer()
 */
class ScheduleManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.schedule.data.schedule';
}
