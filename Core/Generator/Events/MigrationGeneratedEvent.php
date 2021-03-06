<?php

namespace Core\Generator\Events;

use Core\Generator\Abstracts\ResourceGeneratedEvent;

/**
 * Class MigrationGeneratedEvent
 * @package Base\Generator\Events
 */
class MigrationGeneratedEvent extends ResourceGeneratedEvent
{
    public function getTableName()
    {
        return $this->getStubOption('table');
    }

    public function isMongoMigration()
    {
        return $this->getStubOption('mongo');
    }
}
