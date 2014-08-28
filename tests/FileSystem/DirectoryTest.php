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

  public function testScanMigrationFolder($path = './migrations')
  {
    $files = $this->directory->scan($path);        
    $this->assertNotEmpty($files);    
    $this->assertCount(2, $files);
  }

}