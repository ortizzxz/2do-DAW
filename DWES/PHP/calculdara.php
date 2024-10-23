<?php

interface Operation{
    public function execute($numberOne, $numberTwo);
}

function sanitizeNumber($number){
    return filter_var($number,  FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function validateNumber($number){
    return filter_var($number, FILTER_VALIDATE_FLOAT);
}

class Addition($numberOne, $numberTwo){
    $numerOne = sanitizeNumber($numberOne);
    $numberTwo = sanitizeNumber($numberTwo);

    $isValidNumberOne = validateNumber($numberOne);
    $isValidNumberTwo = validateNumber($numberTwo);

    if($isValidNumberOne && $isValidNumberTwo){
        echo ('<h1>' . $numberOne +  $numberTwo . '</h1>');
    }else{
        echo 'Introduzca valores correctos';
    }
}

function substractTwoNums($numberOne, $numberTwo){
    $numerOne = sanitizeNumber($numberOne);
    $numberTwo = sanitizeNumber($numberTwo);

    $isValidNumberOne = validateNumber($numberOne);
    $isValidNumberTwo = validateNumber($numberTwo);

    if($isValidNumberOne && $isValidNumberTwo){
        echo ('<h1>' . $numberOne -  $numberTwo . '</h1>');
    }else{
        echo 'Introduzca valores correctos';
    }
}

function multiplyTwoNums($numberOne, $numberTwo){
    $numerOne = sanitizeNumber($numberOne);
    $numberTwo = sanitizeNumber($numberTwo);

    $isValidNumberOne = validateNumber($numberOne);
    $isValidNumberTwo = validateNumber($numberTwo);

    if($isValidNumberOne && $isValidNumberTwo){
        echo ('<h1>' . $numberOne *  $numberTwo . '</h1>');
    }else{
        echo 'Introduzca valores correctos';
    }
}

function divideTwoNums($numberOne, $numberTwo){
    $numerOne = sanitizeNumber($numberOne);
    $numberTwo = sanitizeNumber($numberTwo);

    $isValidNumberOne = validateNumber($numberOne);
    $isValidNumberTwo = validateNumber($numberTwo);

    if($isValidNumberOne && $isValidNumberTwo){
        echo ('<h1>' . $numberOne /  $numberTwo . '</h1>');
    }else{
        echo 'Introduzca valores correctos';
    }
}

if(isset($_POST['num1'], $_POST['num2'])){

    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];

    switch($_POST['action']){
        case 's':
            sumTwoNums($n1, $n2);
            break;
        case 'r':
            substractTwoNums($n1, $n2);
            break;
        case 'm':
            multiplyTwoNums($n1, $n2);
            break;
        case 'd':
            divideTwoNums($n1, $n2);
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