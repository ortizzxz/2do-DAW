<html>
    <head>
        <title>Formulario</title>
    </head>
    <body>
        <h1>Alta alumno</h1>    

        <form action="form1.php" method="post">
            Nombre: <input type="text" name="nombre" id="nombre"> <br> <br>
            Apellido: <input type="text" name="apellidos" id="apellidos"> <br> <br>
            Fecha de Nacimiento <input type="date" name="fechanacimiento" id="fechanacimiento"> <br> <br>
            Correo Electrónico: <input type="email" name="correo" id="correo"> <br> <br>
            ¿Qúe lenguajes de programación conoces? 
                <input type="checkbox" name="lenguajes[]" id="C++"> C++
                <input type="checkbox" name="lenguajes[]" id="JavaScript"> JavaScript
                <input type="checkbox" name="lenguajes[]" id="PHP"> PHP
                <input type="checkbox" name="lenguajes[]" id="Python"> Python <br> <br>
            ¿Sabes crear páginas webs estáticas? 
                <input type="radio" name="saber" value="1" id="si"> Si
                <input type="radio" name="saber" value="0" id="no"> No <br> <br>
            Comentarios: <br>
            <textarea name="comentarios" id="comentarios"></textarea> <br> <br>
            Contraseña: <input type="password" name="contrasena[]" id="contrasena"> <br> <br>
            Repita la contraseña: <input type="password" name="contrasena[]" id="contrasena"> <br> <br>
            
            <button type="submit">Enviar</button>
            
            
        </form>
    </body>
</html>