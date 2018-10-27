<?php

namespace Railken\Amethyst\Schemas;

use Railken\Amethyst\Managers\WorkManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class ScheduleSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\LongTextAttribute::make('description'),
            Attributes\BooleanAttribute::make('enabled'),
            Attributes\BelongsToAttribute::make('work_id')
                ->setRelationName('work')
                ->setRelationManager(WorkManager::class),
            Attributes\TextAttribute::make('cron')
                ->setRequired(true),
            Attributes\ObjectAttribute::make('data'),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
