<?php

namespace Yanobase\Database;

use Yanobase\Exception;

class Database
{

  protected $adapter;

  public function __construct(AdapterInterface $adapter)
  {
    $this->adapter = $adapter;
  }  

  public function execAll(array $statements)
  {
    $affected = 0;
    if (isset($statements) && !empty($statements)) {
      $this->adapter->beginTransaction();
      foreach ($statements as $statement) {
        $affected += $this->exec($statement);                   
        $errorInfo = $this->adapter->errorInfo();
        if ($this->adapter->hasError())
          $this->adapter->rollback();                  
      }
      $this->adapter->commit();
    }   
    return $affected;
  }

  public function exec($statement)
  {   
    $affected = $this->adapter->exec($statement);
    $errorInfo = $this->adapter->errorInfo();
    if ($this->adapter->hasError())      
      throw new Exception("Error Processing Statement: " . implode(' ', $errorInfo), 1);              
    return $affected;
  }

}