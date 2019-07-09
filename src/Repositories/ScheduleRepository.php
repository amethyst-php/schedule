<?php

namespace Amethyst\Repositories;

use Railken\Lem\Repository;

class ScheduleRepository extends Repository
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function findAllEnabled()
    {
        return $this->newQuery()->where('enabled', 1)->get();
    }
}
