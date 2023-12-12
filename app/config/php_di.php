<?php

use app\database\Connect;
use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions([
  PDO::class => Connect::connect()
]);
$container = $builder->build();
