<?php

namespace app\controllers;

use app\database\Connect;
use core\library\RateLimit;
use core\library\Redirect;
use core\library\Template;
use PDO;

class LoginController
{
  public function __construct(
    private PDO $connect,
    private Template $template,
    private RateLimit $reateLimit,
    private Redirect $redirect,
  ) {
  }

  public function index()
  {
    $this->template->view('login');
  }

  public function store()
  {
    $this->reateLimit->name = 'login';
    $this->reateLimit->check();

    // workflow para login

    $this->redirect->to('/login');
  }
}
