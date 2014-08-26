<?php

namespace Test;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase 
{

	public function getPath()
	{
		return __DIR__ . '/../migrations';
	}

	public function getPDO()
	{
		return new \PDO('sqlite::memory:');
	}

}