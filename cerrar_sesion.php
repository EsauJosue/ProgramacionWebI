<?php
//Cargando clases automaticamente
spl_autoload_register(function ($class) {
    include "./class/$class/$class.class.php";
});

$session = new Session();
//Restringiendo acceso a personas no autenticadas.
if(! $session->validateSession('id'))
{
    header('location: login.php?message=Usuario o contraseña incorrectos&type=warningMessage');
}

$session->destroySession();
header('location: login.php');

?>