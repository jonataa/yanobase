<?php

namespace Yanobase\Database;

class DatabaseFactory
{

  public static function createFromPDO(\PDO $pdo)
  {   
    return new Database(new PdoAdapter($pdo));
  }

}