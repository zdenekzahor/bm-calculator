<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web;

use Nette\Bootstrap\Configurator;


class Bootstrap
{
	public static function boot(): Configurator
	{
		$configurator = new Configurator;
		$appDir = dirname(__DIR__, 2);

		$debugMode = getenv('NETTE_DEBUG_MODE');
		if ($debugMode !== '') {
			$configurator->setDebugMode($debugMode === '1' ? true : $debugMode);
		}
		$configurator->enableTracy($appDir . '/log');

		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory($appDir . '/temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__ . '/..')
			->register();

		$configurator->addConfig($appDir . '/config/common.neon');
		$configurator->addConfig($appDir . '/config/services.neon');
		$configurator->addConfig($appDir . '/config/local.neon');

		return $configurator;
	}
}
