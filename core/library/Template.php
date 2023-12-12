<?php

namespace core\library;

use League\Plates\Engine;

class Template
{
  public function view(
    string $view,
    array $data = []
  ) {
    $path = dirname(__FILE__, 3) . '/resources/views/';
    $templates = new Engine($path);

    // Render a template
    echo $templates->render($view, $data);
  }
}
