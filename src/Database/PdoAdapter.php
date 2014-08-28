<?php

namespace Yanobase\Database;

class PdoAdapter implements AdapterInterface
{

  protected $pdo;

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function exec($statement)
  {         
    return $this->pdo->exec($statement);    
  }

  public function beginTransaction()
  {
    return $this->pdo->beginTransaction();
  }

  public function commit()
  {
    return $this->pdo->commit();
  }

  public function rollback()
  {
    return $this->pdo->rollback();
  }

  public function errorInfo()
  {
    return $this->pdo->errorInfo();
  }

  public function hasError()
  {
    $errorInfo = $this->pdo->errorInfo();
    return isset($errorInfo[1]) && !empty($errorInfo[1]);
  }

}