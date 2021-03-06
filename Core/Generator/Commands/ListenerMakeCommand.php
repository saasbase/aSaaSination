<?php

namespace Core\Generator\Commands;

use Core\Core\Api;
use Core\Generator\Abstracts\ClassGeneratorCommand;
use Core\Generator\Events\ListenerGeneratedEvent;
use Symfony\Component\Console\Input\InputOption;

class ListenerMakeCommand extends ClassGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'zz:make:listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new event listener class for the specified module';

    /**
     * The name of the generated resource.
     *
     * @var string
     */
    protected $generatorName = 'listener';

    /**
     * The file path.
     *
     * @var string
     */
    protected $filePath = '/Listeners';

    /**
     * The event that will fire when the file is created.
     *
     * @var string
     */
    protected $event = ListenerGeneratedEvent::class;

    protected function stubOptions(): array
    {
        return [
            'NAMESPACE'       => $this->getClassNamespace(),
            'CLASS'           => $this->getClassName(),
            'EVENT_NAMESPACE' => $this->getModule()->getNamespace() . '\\' . 'Events' . '\\' . $this->getEventName(),
            'EVENT'           => $this->getEventName(),
            'QUEUED'          => $this->needsQueing()
        ];
    }

    protected function afterGeneration(): void
    {
        $this->info("don't forget to add the listener to " . $this->getEventName());
    }

    /**
     * @return string
     */
    protected function stubName(): string
    {
        if ($this->needsQueing()) {
            return 'listener-queued.stub';
        }

        return 'listener.stub';
    }

    protected function needsQueing(): bool
    {
        return $this->getOption('queued');
    }

    protected function getEventName(): string
    {
        return $this->getOption('event');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function setOptions(): array
    {
        return [
            ['event', null, InputOption::VALUE_OPTIONAL, 'What is the name of the event that should be listened on?', null],
            ['queued', null, InputOption::VALUE_OPTIONAL, 'Should the listener be queued?', false],
        ];
    }

    protected function handleEventOption($shortcut, $type, $question, $default)
    {
        return $this->anticipate($question, Api::getModule($this->getModuleName())->getEvents()->getAllPhpFileNamesWithoutExtension(), $default);
    }

    protected function handleQueuedOption($shortcut, $type, $question, $default)
    {
        return $this->confirm($question, $default);
    }
}
