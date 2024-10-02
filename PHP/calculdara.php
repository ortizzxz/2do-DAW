<?php
// if(isset($_POST['username'], $_POST['password']))
if(isset($_POST['num1'], $_POST['num2'])){
    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];

    switch($_POST['action']){
        case 's':
            echo ('<h1>' .($n1 + $n2). '</h1>');
            break;
        case 'r':
            echo ('<h1>' .($n1 - $n2). '</h1>');
            break;
        case 'm':
            echo ('<h1>' .($n1 * $n2). '</h1>');
            break;
        case 'd':
            echo ('<h1>' .($n1 / $n2). '</h1>');
            break;
        default:
            break;        
    }
}
?>

<html>
<body>
    <form action="calculdara.php" method="post">
        <input type="text" name="num1">Numero 1 <br> <br>
        <input type="text" name="num2">Numero 2
        
        <br>
        <br>
        <button type="submit" name="action" value="s">Sumar</button>
        <button type="submit" name="action" value="r">Restar</button>
        <button type="submit" name="action" value="m">Multiplicar</button>
        <button type="submit" name="action" value="d">Dividir</button>
    </form>
</body>
</html>