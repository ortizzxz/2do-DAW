<?php
$metodoAcceso = [
    "usuario" => 1234, 
    "jesus" => "jesus",
    "manolo" => "botella"
];

if (isset($_POST['username']) && isset($_POST['password']) && 
   !empty($_POST['username']) && !empty($_POST['password'])){

    // 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    foreach($metodoAcceso as $usuario => $claveUsuario ){
        if ( ($usuario == $username && $password == $claveUsuario)){
            header('Location: pagBienvenida.php');
        }else{
            echo "Error de autenticación";
        }
    }

}else{
    header('Location: login.php');
}

?>