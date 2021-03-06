<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Router;

use Nette\Application\Routers\RouteList;
use Nette\StaticClass;


final class RouterFactory
{
	use StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('/sign/in', 'Front:Sign:in');
		$router->addRoute('/sign/out', 'Front:Sign:out');
		$router->addRoute('/', 'Front:Homepage:default');
		return $router;
	}
}
