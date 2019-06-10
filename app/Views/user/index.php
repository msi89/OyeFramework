<?php
   $this->title = "Contacts US";
?>
<div class="container">
   <h1>List users</h1>
<?php  if(isset($error)):?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>
<?php  if(isset($success)):?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>
<a href="./user" class="btn btn-success">Create</a>
<table class="table" style="margin-top: 30px;">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Username</th>
<th>Created</th>
<th>Updated</th>
</tr>
</thead>
  <tbody>
    <?php foreach($users as $user) : ?>
    <tr>
      <td><?= $user->id ?></td>
      <td><?= $user->name ?></td>
      <td><?= $user->email ?></td>
      <td><?= $user->username ?></td>
      <td><?= $user->created_at ?></td>
      <td><?= $user->updated_at ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<?php

if(isset($form)){
  var_dump($form);
}