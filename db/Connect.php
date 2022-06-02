<?php

class Connect
{
  private static $connect;

  private function __construct()
  {
  }

  public static function getInstance()
  {
    if (is_null(self::$connect)) {
      self::$connect = new \PDO('mysql:host=localhost;port=3306;dbname=mvcteste', 'root', '');
      self::$connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      self::$connect->exec('set names utf8');
    }
    return self::$connect;
  }
}
