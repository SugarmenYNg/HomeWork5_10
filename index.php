<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomWork5_10</title>
</head>
<body>
<h2>Функции</h2>
<ul style="list-style-type: none;">
    <li>1) Напишите функцию operation(), которая принимает три аргумента: $numOne и $numTwo – числовые, $operator – строка,
        обозначающий операцию (add, subtract, multiply, divide). Функция должна возвращать результат выполнения оператора
        $operator над $numOne и $numTwo. Числа и оператор задавать через форму.</li>
    <li>2) Создайте две функции add() и sub(), которые принимают пару аргументов и возвращают сумму и разницу соответственно.
        Создайте функцию operation(), которая принимает два числовых аргумента $numOne и $numTwo, и третий строковый - имя
        функции которую нужно вызвать для выполнения операции над числамы.</li>
</ul>
<?php
//Подключаем файл с функциями
include "function.php";
echo "<b>Задание 1:</b><br>";
?>
<form action="" method="POST">
    <?//Два аргумента?>
    <input type="text" name="argument1">
    <input type="text" name="argument2"><br>

    <?//Кнопки с математическими операциями?>
    <input type="submit" name="action" value="add">
    <input type="submit" name="action" value="subtract">
    <input type="submit" name="action" value="multiply">
    <input type="submit" name="action" value="divide"><br>
</form>
<?php
echo "<br><b>Вывод результатов:</b><br><br>";

if (array_key_exists('argument1', $_POST) && array_key_exists('argument2', $_POST) && array_key_exists('action', $_POST)) {
    // Обработка полученных значений из поста перед передачей в функцию
    $argValue1 = htmlspecialchars($_POST['argument1']);
    $argValue2 = htmlspecialchars($_POST['argument2']);
    $argValue3 = htmlspecialchars($_POST['action']);

    $resCalcReturn = calculator($argValue1, $argValue2, $argValue3);

    if (is_float($resCalcReturn)) {
        //Массив сответствия названий математических действий их математическим символам для красивого вывода
        $arMatchSymbolByName = [
            "add"      => "+",
            "subtract" => "-",
            "multiply" => "*",
            "divide"   => "/"
        ];

        echo $argValue1." ".$arMatchSymbolByName[$argValue3]." ".$argValue2." = ".$resCalcReturn."<br><br>";
    } else {
        echo $resCalcReturn;
    }
}

echo "<br><br>";

echo "<b>Задание 2:</b><br>";
?>
<form action="" method="POST">
    <?//Два аргумента и?>
    <input type="text" name="arg1">
    <input type="text" name="arg2">
    <input type="text" name="funcName"><br>

    <?//Кнопки с математическими операциями?>
    <input type="submit" name="action" value="Выполнить"><br>
</form>
<?php
echo "<br><b>Вывод результатов:</b><br><br>";

if (array_key_exists('arg1', $_POST) && array_key_exists('arg2', $_POST) && array_key_exists('funcName', $_POST)) {
    // Обработка полученных значений из поста перед передачей в функцию
    $arg1 = htmlspecialchars($_POST['arg1']);
    $arg2 = htmlspecialchars($_POST['arg2']);
    $functionName = htmlspecialchars($_POST['funcName']);

    $resCalcReturn = operation($arg1, $arg2, $functionName);

    if (!empty($resCalcReturn)) {
        //Массив сответствия названий математических действий их математическим символам для красивого вывода
        $arMatchSymbolByName = [
            "add" => "+",
            "sub" => "-",
        ];

        echo $arg1." ".$arMatchSymbolByName[$functionName]." ".$arg2." = ".$resCalcReturn."<br><br>";
    } else {
        echo "Отсутствует введенная вами функция";
    }
}
?>
</body>
</html>
