<?php

declare(strict_types=1);

use Nette\Application\Application;
use ZdenekZahor\BmCalculator\Web\Bootstrap;

require __DIR__ . '/../vendor/autoload.php';

$configurator = Bootstrap::boot();
$container = $configurator->createContainer();
$application = $container->getByType(Application::class);
$application->run();
