<?php

namespace Yanobase\FileSystem;

use Yanobase\Exception;

class Directory
{

	protected $files;

	public function scan($path, $extension = 'sql')
	{				
		if (! file_exists($path))
			throw new Exception("Folder not exists! {$path}", 1);		
		
		return array_filter(scandir($path), $this->filterExtension($extension));
	}

	public function filterExtension($extension)
	{
		return function($filename) use ($extension) {
			return pathinfo($filename, PATHINFO_EXTENSION) == $extension 
						 && preg_match_all('/(^(V|v)[1-9999999]_).*/', $filename);
		};
	}

}