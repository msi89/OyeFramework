<?php
   $this->title = "Register";
?>
<div class="container" style="margin-top: 50px">
   <h1 style="margin-bottom: 50px">Sign UP please</h1>
<?php  if(isset($error)):?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

   <form method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter your name" value="<?= $user->name ?>" required>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email address" value="<?= $user->email ?>" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" value="<?= $user->username ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>

</div>
