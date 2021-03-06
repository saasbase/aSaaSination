<?php

namespace Core\Generator\Events;

use Core\Generator\Abstracts\ResourceGeneratedEvent;

/**
 * Class ComposerGeneratedEvent
 * @package Base\Generator\Events
 */
class ComposerGeneratedEvent extends ResourceGeneratedEvent
{
    public function getAuthorName()
    {
        return $this->getStubOption('author_name');
    }

    public function getAuthorMail()
    {
        return $this->getStubOption('author_mail');
    }
}
