<?php

namespace Mrtnzlml\Tests;

use Tester\FileMock;

class CustomExtension extends \Mrtnzlml\CompilerExtension
{

	public function loadConfiguration()
	{
		$config = <<<CONFIG
parameters:
	k2: overridden
	k3: v3
services:
	- Mrtnzlml\Tests\TestService
	named: Mrtnzlml\Tests\Service2
ext2:
	ek2: overridden
	ek3: ev3
latte:
	macros:
		- Ant\Grid\Latte\Macros
CONFIG;
		$this->addConfig(FileMock::create($config, 'neon'));
	}

	public function beforeCompile()
	{
		$this->setMapping(['Module' => 'App\*Module\Controllers\*Controller']);
	}

	public function getExtensions($type = NULL)
	{
		return $this->compiler->getExtensions($type);
	}

	public function reloadDefinition($regex)
	{
		parent::reloadDefinition($regex);
	}

}