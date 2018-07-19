<?php

namespace Railken\LaraOre\Schedule;

use Railken\Laravel\Manager\ModelRepository;

class ScheduleRepository extends ModelRepository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function findAllEnabled()
    {
        return $this->newQuery()->where('enabled', 1)->get();
    }
}
