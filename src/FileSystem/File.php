<?php

namespace Yanobase\FileSystem;

use Yanobase\Exception;

class File
{

	public function getContent($filename)
	{		
		if (! file_exists($filename)
				&& is_readable($filename)) 
			throw new Exception("File not exists or no permission to read! {$filename}", 1);		

		return file_get_contents($filename);
	}

	public function getContents(array $files)
	{		
		$contents = array();
		foreach ($files as $file)
			$contents[hash('md5', $file)] = array('filename' => $file, 'raw' => $this->getContent($file));
		return $contents;
	}

}