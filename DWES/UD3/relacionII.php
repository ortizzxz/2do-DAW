<?php
$metodoAcceso = [
    "usuario" => 1234, 
    "jesus" => "jesus",
    "manolo" => "botella"
];

$autenticado = false;


if (isset($_POST['username']) && isset($_POST['password']) && 
   !empty($_POST['username']) && !empty($_POST['password'])){

    // 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    foreach($metodoAcceso as $usuario => $claveUsuario ){
        if ( ($usuario == $username && $password == $claveUsuario)){
            header('Location: https://th.bing.com/th/id/OIP.RaWfNI33445ZRFboZVQDDQHaLH?rs=1&pid=ImgDetMain');
            $autenticado = true;
        }
    }

    if(!$autenticado){
        echo "Error de autenticación";
    }

}else{
    header('Location: login.php');
}

?>