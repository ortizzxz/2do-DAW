<!DOCTYPE html>
<html>

<body>
    <form method="post" action="validationI.php">

        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span></br>
        E-mail: <input type="text" name="email"> </br>
        Website: <input type="text" name="website"> </br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea> </br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other

        <input type="submit">
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>
</body>

</html>

