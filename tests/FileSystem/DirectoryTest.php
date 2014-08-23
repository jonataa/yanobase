<?php

namespace Test;

use Test\AbstractTest;
use Yanobase\FileSystem\Directory;

class DirectoryTest extends AbstractTest 
{

  protected $directory;

  public function setUp()
  {
    $this->directory = new Directory;
  }

  public function testScan($path = './migrations')
  {
    $files = $this->directory->scan($path);
    $this->assertNotEmpty($files);    
    $this->assertCount(1, $files);
  }

}