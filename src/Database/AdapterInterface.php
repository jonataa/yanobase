<?php

namespace Yanobase\Database;

interface AdapterInterface 
{

	public function exec($statement);
	public function beginTransaction();
	public function commit();
	public function rollback();
	public function errorInfo();
	public function hasError();

}
