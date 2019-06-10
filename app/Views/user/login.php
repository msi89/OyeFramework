<?php
   $this->title = "Login";
?>
<div class="container" style="margin-top: 50px">
   <h1 style="margin-bottom: 50px">Sign In please</h1>
<?php  if(isset($error)):?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

   <form method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email address" value="<?= $user->email ?>" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" value="<?= $user->password ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

</div>
