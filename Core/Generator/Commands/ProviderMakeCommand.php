<?php

namespace Core\Generator\Commands;

use Core\Generator\Abstracts\AbstractGeneratorCommand;
use Core\Generator\Abstracts\ClassGeneratorCommand;
use Core\Generator\Events\ProviderGeneratedEvent;

class ProviderMakeCommand extends ClassGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'zz:make:provider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service provider class for the specified module.';

    /**
     * The name of the generated resource.
     *
     * @var string
     */
    protected $generatorName = 'provider';

    /**
     * The stub name.
     *
     * @var string
     */
    protected $stub = 'provider.stub';

    /**
     * The file path.
     *
     * @var string
     */
    protected $filePath = '/Providers';

    /**
     * The event that will fire when the file is created.
     *
     * @var string
     */
    protected $event = ProviderGeneratedEvent::class;

    protected function stubOptions(): array
    {
        return [
            'NAMESPACE' => $this->getClassNamespace(),
            'CLASS'     => $this->getClassName(),
        ];
    }
}
