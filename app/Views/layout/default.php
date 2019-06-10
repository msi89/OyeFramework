<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">    
    <title><?= $this->title ?></title>
</head>
<body>
    

    <header class="navbar navbar-expand navbar-dark bg-dark flex-column flex-md-row bd-navbar">
  <a class="navbar-brand mr-0 mr-md-2" href="/" aria-label="Bootstrap">
  <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
             Oye bootstrap  
             <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="d-block" viewBox="0 0 612 612" role="img" focusable="false"><title>Bootstrap</title><path fill="currentColor" d="M510 8a94.3 94.3 0 0 1 94 94v408a94.3 94.3 0 0 1-94 94H102a94.3 94.3 0 0 1-94-94V102a94.3 94.3 0 0 1 94-94h408m0-8H102C45.9 0 0 45.9 0 102v408c0 56.1 45.9 102 102 102h408c56.1 0 102-45.9 102-102V102C612 45.9 566.1 0 510 0z"></path><path fill="currentColor" d="M196.77 471.5V154.43h124.15c54.27 0 91 31.64 91 79.1 0 33-24.17 63.72-54.71 69.21v1.76c43.07 5.49 70.75 35.82 70.75 78 0 55.81-40 89-107.45 89zm39.55-180.4h63.28c46.8 0 72.29-18.68 72.29-53 0-31.42-21.53-48.78-60-48.78h-75.57zm78.22 145.46c47.68 0 72.73-19.34 72.73-56s-25.93-55.37-76.46-55.37h-74.49v111.4z"></path></svg> -->
 </a>

  <div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
      <li class="nav-item">
        <a class="nav-link active" href="#">Docs</a>
      </li>
    </ul>
  </div>

  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
    <li class="nav-item">
        <a class="nav-link " href="./">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-item nav-link mr-md-2" href="./login"> Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-item nav-link mr-md-2" href="./register"> Register</a>
    </li>
    <!-- <li class="nav-item dropdown">
      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        John Doe
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
        <a class="dropdown-item active" href="#">Profile</a>
        <a class="dropdown-item" href="#">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Logout</a>
      </div>
    </li> -->
  </ul>

</header>

<?= $content ?>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>