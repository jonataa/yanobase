<?php

namespace Test;

use Test\AbstractTest;
use Yanobase\Database\DatabaseFactory;

class DatabaseTest extends AbstractTest
{

	protected $database;
	protected $pdo;

	public function setUp()
	{		
		$this->pdo = $this->getPDO();
		$this->database = DatabaseFactory::createFromPDO($this->pdo);
	}

	public function testExec()
	{
		$statement = <<<STATEMENT
CREATE TABLE person (
    id INT NOT NULL,
    name VARCHAR(100) NOT NULL
);
INSERT INTO person (id, name) VALUES (1, 'Axel');
STATEMENT;
				
		$affected = $this->database->exec($statement);				
		$this->assertEquals(1, $affected);		
	}	

	public function testExecAll()
	{
		$statements[] = <<<STATEMENT
CREATE TABLE person (
    id INT NOT NULL,
    name VARCHAR(100) NOT NULL
);
INSERT INTO person (id, name) VALUES (1, 'Axel');
INSERT INTO person (id, name) VALUES (2, 'Mr. Foo');
INSERT INTO person (id, name) VALUES (3, 'Ms. Bar');
STATEMENT;
		$affected = $this->database->execAll($statements);	
		$this->assertEquals(1, $affected);			
	}

}