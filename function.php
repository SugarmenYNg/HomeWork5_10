<?php
//Включаем режим строгой типизации
declare(strict_types=1);

/**
 * Функция calculator создана по первому заданию Домашней работы №10 Функции. Функцию в этом задании назвал calculator
 * вместо operation.
 *
 * @param float $numOne
 * @param float $numTwo
 * @param string $operator
 * @return float|int|string
 */
function calculator(float $numOne, float $numTwo, string $operator) {
    switch ($operator) {
        case 'add':
            $res = $numOne + $numTwo;
            break;
        case 'subtract':
            $res = $numOne - $numTwo;
            break;
        case 'multiply':
            $res = $numOne * $numTwo;
            break;
        case 'divide':
            if ($numTwo != 0) {
                $res = $numOne / $numTwo;
            } else {
                $res = 'Деление на ноль';
            }
            break;
        default:
            $res = 'Не допустимый тип операции';
    }

    return $res;
}

/**
 * Функция operation создана по второму заданию Домашней работы №10 Функции.
 *
 * @param float $numOne
 * @param float $numTwo
 * @param string $functionName
 * @return float|null
 */
function operation(float $numOne, float $numTwo, string $functionName):?float {
    $result = null;

    if (function_exists($functionName)) {
        $result = $functionName($numOne, $numTwo);
    }

    return $result;
}

/**
 * Функция add сложения
 *
 * @param float $valOne
 * @param float $valTwo
 * @return float
 */
function add(float $valOne, float $valTwo):float {
    return $valOne + $valTwo;
}

/**
 * Функция sub вычитание
 *
 * @param float $valOne
 * @param float $valTwo
 * @return float
 */
function sub(float $valOne, float $valTwo):float {
    return $valOne - $valTwo;
}
