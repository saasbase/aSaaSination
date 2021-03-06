<?php

namespace Core\Generator\Commands;

use Core\Generator\Abstracts\AbstractGeneratorCommand;
use Core\Generator\Abstracts\ClassGeneratorCommand;
use Core\Generator\Events\RuleGeneratedEvent;

class RuleMakeCommand extends ClassGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'zz:make:rule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new validation rule for the specified module.';

    /**
     * The name of the generated resource.
     *
     * @var string
     */
    protected $generatorName = 'rule';

    /**
     * The stub name.
     *
     * @var string
     */
    protected $stub = 'rule.stub';

    /**
     * The file path.
     *
     * @var string
     */
    protected $filePath = '/Rules';

    /**
     * The event that will fire when the file is created.
     *
     * @var string
     */
    protected $event = RuleGeneratedEvent::class;

    protected function stubOptions(): array
    {
        return [
            'NAMESPACE' => $this->getClassNamespace(),
            'CLASS'     => $this->getClassName(),
        ];
    }
}
