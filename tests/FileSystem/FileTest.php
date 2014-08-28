<?php

namespace Test;

use Test\AbstractTest;
use Yanobase\FileSystem\File;

class FileTest extends AbstractTest
{

  protected $file;

  public function setUp()
  {
    $this->file = new File;
  }

  public function testGetContent($file = './migrations/V1_Create_Person.sql')
  {
    $content = $this->file->getContent($file);
    $this->assertNotEmpty($content);    
  }

  public function testGetContents()
  {
    $files    = ['./migrations/V1_Create_Person.sql', './migrations/V2_Add_people.sql'];
    $contents = $this->file->getContents($files);           
    $this->assertNotEmpty($contents);   
    $this->assertCount(count($files), $contents);
  }

}