<?php

use app\database\Connect;
use DI\ContainerBuilder;

require '../vendor/autoload.php';

session_start();

require '../app/config/php_di.php';
require '../routes/web.php';
