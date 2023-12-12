<?php

namespace core\library;

class Redirect
{
  public function to(
    string $path
  ) {
    return header("Location: {$path}");
    die();
  }

  public function back()
  {
    if (isset($_SERVER["HTTP_REFERER"])) {
      $previous = $_SERVER["HTTP_REFERER"];
    } else {
      $previous = "javascript:history.go(-1)";
    }
    $this->to($previous);
    die();
  }
}
