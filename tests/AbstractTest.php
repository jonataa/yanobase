<?php

namespace Test;

use Yanobase\Database\DatabaseFactory;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase 
{

  public function getPath()
  {
    return __DIR__ . '/../migrations';
  }

  public function getDatabase()
  {
    return DatabaseFactory::createFromPDO($this->getPDO());
  }

  public function getPDO()
  {
    return new \PDO('sqlite::memory:');
  }

}