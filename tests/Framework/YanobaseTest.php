<?php

namespace Test;

use Yanobase\Framework\Yanobase;

class YanobaseTest extends AbstractTest
{

	protected $yanobase;

	public function setUp()
	{		
		$this->yanobase = new Yanobase($this->getPath());		
	}

	public function testMigrate()
	{		
		$this->assertCount(2, $this->yanobase->migrate($this->getPDO()));
	}

}