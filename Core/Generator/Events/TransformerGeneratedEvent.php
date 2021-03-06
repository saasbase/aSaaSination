<?php

namespace Core\Generator\Events;

use Core\Generator\Abstracts\ResourceGeneratedEvent;

/**
 * Class TransformerGeneratedEvent
 * @package Foundation\Generator\Events
 */
class TransformerGeneratedEvent extends ResourceGeneratedEvent
{
    public function getModel()
    {
        return $this->getStubOption('model');
    }

    public function getModelNamespace()
    {
        return $this->getStubOption('model_namespace');
    }
}
