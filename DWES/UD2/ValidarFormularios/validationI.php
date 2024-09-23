<?php
    //DECLARAMOS LAS VARIABLES E INICIAMOS A VACIO
    $name = $email = $website = $comment = $gender = "";

    // vamos a validar el formulario para evitar ataques XSS
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
    };
    
    
    // funcion 
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    };
    
    //display data 
    echo "Nombre: " .$name. " <br />";
    echo "Email: " .$email. " <br />";
    echo "Website: " .$website. " <br />";
    echo "Genero: ". $gender." <br />";
?>