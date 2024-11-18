<?php
    function escribeError($error){
        echo("<span style= color:'red'>" .$error. "</span>");
    }

    function filter($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    // NOMBRE 

    if(empty($_POST["nombre"])){
        $errores["nombre"] = "El nombre es requerido";
    }
    else {
        $nombre_usuario = filtrado($_POST["nombre"]);
        if (!preg_match("/^[a-zA-Z]+$/", $nombre_usuario)){
            $errores["nombre"] = "El nombre solo ha de estar compuesto por letras.";
        }
    }


?>

<html>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p>Escriba los datos siguientes:</p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php (isset($nombre_usuario)?print($nombre_usuario):"");?>"/> <?php (isset($errores) && isset($errores["nombre"]))? escribeError($errores["nombre"]):"";?> <br/>
            <label for="nombre">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php (isset($apellido_usuario)?print($apellido_usuario):"");?>"/> <?php (isset($errores) && isset($errores["apellido"]))? escribeError($errores["apellido"]):"";?> <br/>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php (isset($telefono_usuario)?print($telefono_usuario):"");?>"/> <?php (isset($errores) && isset($errores["telefono"]))? escribeError($errores["telefono"]):"";?><br/>
            <label for="email">Correo:</label>
            <input type="text" id="email" name="email" value="<?php (isset($email_usuario) ? print($email_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["email"])) ? escribeError($errores["email"]): ""; ?> <br/>
            <label for="empleo">Empleo Actual: </label>
            <input type="radio" name="sinEmpleo" id="sinEmpleo" value="<?php (isset($empleo_usuario) ? print($empleo_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["empleo"])) ? escribeError($errores["empleo"]): ""; ?>  Sin Empleo 
            <input type="radio" name="mediaJornada" id="mediaJornada" value="<?php (isset($empleo_usuario) ? print($empleo_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["empleo"])) ? escribeError($errores["empleo"]): ""; ?>Media Jornada
            <input type="radio" name="tiempoCompleto" id="tiempoCompleto" value="<?php (isset($empleo_usuario) ? print($empleo_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["empleo"])) ? escribeError($errores["empleo"]): ""; ?>Tiempo Completo <br>
            <label for="lenguajes">Lenguajes que Domina: </label> <br>
            <input type="checkbox" name="lenguajes[]" id="python" value="<?php (isset($lenguaje_usuario) ? print($lenguaje_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["lenguajes"])) ? escribeError($errores["lenguajes"]): ""; ?>Python
            <input type="checkbox" name="lenguajes[]" id="javascript" value="<?php (isset($lenguaje_usuario) ? print($lenguaje_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["lenguajes"])) ? escribeError($errores["lenguajes"]): ""; ?>JavaScript
            <input type="checkbox" name="lenguajes[]" id="java" value="<?php (isset($lenguaje_usuario) ? print($lenguaje_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["lenguajes"])) ? escribeError($errores["lenguajes"]): ""; ?> Java
            <input type="checkbox" name="lenguajes[]" id="cplusplus" value="<?php (isset($lenguaje_usuario) ? print($lenguaje_usuario) : "");?> "/> <?php (isset($errores) && isset($errores["lenguajes"])) ? escribeError($errores["lenguajes"]): ""; ?>C++ <br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>