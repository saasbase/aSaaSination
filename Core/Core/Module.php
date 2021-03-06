<?php

namespace Core\Core;

use Core\Abstracts\Job;
use Core\Abstracts\Event;
use Core\Abstracts\Policy;
use Core\Abstracts\Service;
use Core\Abstracts\Listener;
use Core\Abstracts\Observer;
use Illuminate\Http\Request;
use Core\Abstracts\Middleware;
use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\Notification;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Resources\Json\JsonResource;

final class Module
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $path;

    /**
     * ApiModule constructor.
     * @param $name
     */
    public function __construct(string $name, string $path)
    {
        $this->name = $name;
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function getListeners()
    {
        return new Resource('listeners', '/Listeners', $this, Listener::class);
    }

    public function getConfigs()
    {
        return new Resource('configs', '/Config', $this);
    }

    public function getFactories()
    {
        return new Resource('factories', '/Database/factories', $this);
    }

    public function getAttributes()
    {
        return new Resource('attributes', '/Attributes', $this);
    }

    public function getDtos()
    {
        return new Resource('dtos', '/Dtos', $this);
    }

    public function getEvents()
    {
        return new Resource('events', '/Events', $this, Event::class);
    }

    public function getRoutes()
    {
        return new Resource('routes', '/Routes', $this);
    }

    public function getServices()
    {
        return new Resource('services', '/Services', $this, Service::class);
    }

    public function getPolicies()
    {
        return new Resource('policies', '/Policies', $this, Policy::class);
    }

    public function getPermissions()
    {
        return new Resource('permissions', '/Permissions', $this);
    }

    public function getTransformers()
    {
        return new Resource('transformers', '/Transformers', $this, JsonResource::class);
    }

    public function getServiceProviders()
    {
        return new Resource('providers', '/Providers', $this, ServiceProvider::class);
    }

    public function getMigrations()
    {
        return new Resource('migrations', '/Database/Migrations', $this, Migration::class);
    }

    public function getModels()
    {
        return new Resource('models', '/Models', $this, Model::class);
    }

    public function getObservers()
    {
        return new Resource('observers', '/Observers', $this, Observer::class);
    }

    public function getSeeders()
    {
        return new Resource('seeders', '/Database/Seeders', $this, Seeder::class);
    }

    public function getRequests()
    {
        return new Resource('requests', '/Requests', $this, Request::class);
    }

    public function getRules()
    {
        return new Resource('rules', '/Rules', $this, Rule::class);
    }

    public function getMiddleWare()
    {
        return new Resource('middleware', '/Middleware', $this, MiddleWare::class);
    }

    public function getTests()
    {
        return new Resource('tests', '/Tests', $this, TestCase::class);
    }

    public function getCommands()
    {
        return new Resource('commands', '/Console', $this, Command::class);
    }

    public function getNotifications()
    {
        return new Resource('notifications', '/Notifications', $this, Notification::class);
    }

    public function getControllers()
    {
        return new Resource('controllers', '/Controllers', $this, Controller::class);
    }

    public function getJobs()
    {
        return new Resource('jobs', '/Jobs', $this, Job::class);
    }

    public function getNamespace(): string
    {
        return 'Modules' . '\\' . $this->getName();
    }

    public function getMainModel()
    {
        return $this->getModels()->getClassByName($this->getName());
    }

    public function exists(): bool
    {
        return file_exists($this->getPath());
    }

    public function doesNotExist()
    {
        return !$this->exists();
    }
}
