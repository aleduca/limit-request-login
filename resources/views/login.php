<?php $this->layout('layout') ?>

<h1>Login</h1>

<?php dump($_SESSION); ?>

<?php if (isset($_SESSION['login'])) : ?>
  <span class="text text-danger"><?php echo $_SESSION['login']; ?></span>
<?php endif ?>

<form action="/login" method="POST">
  <div>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
  </div>

  <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </div>

  <button type="submit">Login</button>

</form>