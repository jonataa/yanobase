<?php

namespace Yanobase\Framework;

use Yanobase\FileSystem\Directory;
use Yanobase\FileSystem\File;
use Yanobase\Database\Database;
use Yanobase\Exception;

class Yanobase
{

  protected $database;
  protected $migrationsPath;  

  public function __construct(Database $database, $migrationsPath)
  {
    $this->database       = $database;
    $this->migrationsPath = $migrationsPath;
  }  

  public function migrate()
  {
    $directory = new Directory;
    $filenames = $directory->scan($this->migrationsPath);

    $file      = new File;   
    $contents  = $file->getContents($filenames);

    if (isset($contents) && !empty($contents))
      $contents = array_map('self::executeAll', $contents);    

    return $contents;
  }

  private function executeAll($content) 
  {
    $content['affected'] = $this->database->exec($content['raw']);
    return $content;
  }

}