<?php

namespace app\database;

class Connect
{
  private static $instance;

  public static function connect()
  {
    if (!self::$instance) {
      self::$instance = new \PDO('mysql:host=localhost;dbname=blog_ci', 'root', '');
    }

    return self::$instance;
  }
}
