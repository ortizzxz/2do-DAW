<?php
    session_start(); // unirse a la sesión
    $_SESSION = array ();

    session_destroy (); // eliminar la sesión
    // eliminar la cookie

    setcookie(session_name(), 123, time()-1000);
    header ("Location: sesionesLogin.php");
?>