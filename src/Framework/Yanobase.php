<?php

namespace Yanobase\Framework;

use Yanobase\FileSystem\Directory;
use Yanobase\FileSystem\File;
use Yanobase\Database\DatabaseFactory;
use Yanobase\Exception;

class Yanobase
{

	protected $path;

	public function __construct($path)
	{
		$this->path = $path;
	}

	public function migrate(\PDO $pdo)
	{
		$directory = new Directory;
		$filenames = $directory->scan($this->path);

		$file = new File;		
		$contents = $file->getContents($filenames);

		if (isset($contents) && !empty($contents)) {
			$database = DatabaseFactory::createFromPDO($pdo);
			$contents = array_map(function ($content) use ($database) {								
				$content['affected'] = $database->exec($content['raw']);
				return $content;
			}, $contents);						
		}

		return $contents;
	}

}