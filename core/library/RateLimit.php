<?php

namespace core\library;

class RateLimit
{
  public string $name = 'limit';
  public readonly string $ip;

  public function __construct(
    private Redirect $redirect
  ) {
    $this->ip = $_SERVER['REMOTE_ADDR'];
  }

  private function cookieExist(
    int $secondsToExpire
  ) {
    if (isset($_COOKIE[$this->name])) {
      $_SESSION[$this->name] = "Please wait {$secondsToExpire} seconds to try again";
      unset($_SESSION[$this->name . '_limit'][$this->ip]);
      return true;
    } else {
      unset($_SESSION[$this->name]);
      return false;
    }
  }

  private function incrementsAttempts()
  {
    if (isset($_SESSION[$this->name . '_limit'][$this->ip])) {
      $_SESSION[$this->name . '_limit'][$this->ip] += 1;
    } else {
      $_SESSION[$this->name . '_limit'][$this->ip] = 1;
    }
  }

  private function createCookie(
    int $maxAttempts,
    int $secondsToExpire
  ) {
    if ($_SESSION[$this->name . '_limit'][$this->ip] >= $maxAttempts) {
      setcookie($this->name, true, strtotime("+{$secondsToExpire} seconds"));
    }
  }

  public function check(
    int $maxAttempts = 3,
    int $secondsToExpire = 20
  ) {
    if ($this->cookieExist($secondsToExpire)) {
      return $this->redirect->back();
    }

    $this->incrementsAttempts();
    $this->createCookie($maxAttempts, $secondsToExpire);
  }
}
