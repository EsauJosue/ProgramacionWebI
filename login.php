<?php 

//Cargando clases automaticamente
spl_autoload_register(function ($class) {
    include "./class/Message/$class.class.php";
});

// $message = $_GET['message'] ?? ''; 
$message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory:: createMessage($_GET['type']):false;
if($message)
$message_out = $message ? $message->getMessage($_GET['message']) : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/signin.css">
    
</head>
<body class="text-center">
    <form class="form-signin" method="POST" action="validate_login.php">
  <img class="mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <? echo $message_out?>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"  autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
</form>
</body>
</html>