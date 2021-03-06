<?php 
use Philo\Blade\Blade;
use DebugBar\StandardDebugBar;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

// TIME_ZONE
date_default_timezone_set('Asia/Shanghai');

class_alias('Synbass\View','View');

$cache = new Gilbitron\Util\SimpleCache;

$capsule = new Capsule;

$capsule->addConnection(require __DIR__.'/../app/config/database.php');

// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$blade = new Blade(__DIR__ . '/../app/views', __DIR__ . '/../app/runtime/cache');

require __DIR__.'/../app/routes.php';
