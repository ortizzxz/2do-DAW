<?php
//DECLARAMOS LAS VARIABLES E INICIAMOS A VACIO
$name = $email = $website = $comment = $gender = "";
$nameErr = $genderErr = "";

// vamos a validar el formulario para evitar ataques XSS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validar if empty 
    if (empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
    } else {
        $name = test_input($_POST["name"]);
    }

    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }
};


// funcion 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
;
?>

<html>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span></br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>"> </br>
        Website: <input type="text" name="website"> </br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea> </br>

        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Mujer
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Hombre
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Otro
        <span class="error">* <?php echo $genderErr;?></span>

        <input type="submit">
    </form>

    <?php
    if (strlen($name) > 1 && strlen($gender) > 1) {
        echo "<h1>Your Input: </h1>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
    }
    ?>

</body>

</html>