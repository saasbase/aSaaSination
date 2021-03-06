<?php

namespace Core\Generator\Commands;

use Core\Generator\Abstracts\ClassGeneratorCommand;
use Core\Generator\Events\EventGeneratedEvent;
use Core\Generator\Events\GuardGeneratedEvent;

class GuardMakeCommand extends ClassGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'zz:make:guard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new guard class for the specified module';

    /**
     * The name of the generated resource.
     *
     * @var string
     */
    protected $generatorName = 'guard';

    /**
     * The stub name.
     *
     * @var string
     */
    protected $stub = 'guard.stub';

    /**
     * The file path.
     *
     * @var string
     */
    protected $filePath = '/Guards';

    /**
     * The event that will fire when the file is created.
     *
     * @var string
     */
    protected $event = GuardGeneratedEvent::class;

    protected function stubOptions(): array
    {
        return [
            'NAMESPACE' => $this->getClassNamespace(),
            'CLASS'     => $this->getClassName(),
        ];
    }
}
