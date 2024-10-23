<?php

interface Operation
{
    public function execute($numberOne, $numberTwo);
}



class Addition implements Operation
{
    public function execute($numberOne, $numberTwo)
    {
        return $numberOne + $numberTwo;
    }
}

class Substraction implements Operation
{
    public function execute($numberOne, $numberTwo)
    {
        return $numberOne - $numberTwo;
    }
}

class Multiplication implements Operation
{
    public function execute($numberOne, $numberTwo)
    {
        return $numberOne * $numberTwo;
    }
}

class Division implements Operation
{
    public function execute($numberOne, $numberTwo)
    {
        if ($numberTwo == 0) {
            throw new Exception("División por cero no permitida");
        }

        return $numberOne / $numberTwo;
    }
}

class Calculator
{
    private $operations = [];

    public function __construct()
    {
        $this->operations = [
            's' => new Addition(),
            'r' => new Substraction(),
            'm' => new Multiplication(),
            'd' => new Division()
        ];
    }

    public function calculate($action, $numberOne, $numberTwo)
    {
        if (!isset($this->operations[$action])) {
            throw new Exception("Operación no válida");
        }

        $numberOne = $this->sanitizeNumber($numberOne); // -> significa que la funcion es local y no global
        $numberTwo = $this->sanitizeNumber($numberTwo); // si fuese $n = sanitizeNumber($n) implicaria que la funcion es global

        if (!$this->validateNumber($numberOne) || !$this->validateNumber($numberTwo)) {
            throw new Exception('Introduzca valores válidos');
        }

        $result = $this->operations[$action]->execute($numberOne, $numberTwo);
        echo "<h1>$result</h1>";
    }

    private function sanitizeNumber($number)
    {
        return filter_var($number,  FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    private function validateNumber($number)
    {
        return filter_var($number, FILTER_VALIDATE_FLOAT);
    }
}

if (isset($_POST['num1'], $_POST['num2'], $_POST['action'])) {

    $calculator = new Calculator();

    try {
        $calculator->calculate($_POST['action'], $_POST['num1'], $_POST['num2']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
