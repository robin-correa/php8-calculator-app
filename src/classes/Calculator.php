<?php

namespace Robincorrea\Php8CalculatorApp\Classes;

/**
 * Calculator class
 * 
 * @author Robin Correa <robin.correa21@gmail.com>
 */
class Calculator
{
    const INPUT_EXIT = 'exit';
    const INPUT_ZERO = 0.0;
    const SQUARE_ROOT_OPERATOR = 'sqrt';

    /**
     * Main calculation method
     *
     * @param string $input
     * @return float
     */
    public function calculate(string $inputtedExpressionString): float
    {
        // Remove trailing spaces
        $inputtedExpressionString = trim($inputtedExpressionString);

        $expressionsArray = explode(' ', $inputtedExpressionString);

        if (count($expressionsArray) == 2 && $expressionsArray[1] === self::SQUARE_ROOT_OPERATOR) {
            return $this->sqrt((float)$expressionsArray[0]);
        } elseif (count($expressionsArray) == 3) {
            list($number1, $operator, $number2) = $expressionsArray;
            return $this->performBasicOperation((float)$number1, $operator, (float)$number2);
        } else {
            throw new \InvalidArgumentException('Invalid input');
        }
    }

    /**
     * Map and perform operation
     *
     * @param float $number1
     * @param string $operator
     * @param float $number2
     * @return float
     */
    private function performBasicOperation(float $number1, string $operator, float $number2): float
    {
        switch ($operator) {
            case '+':
                $result = $this->add($number1, $number2);
                break;
            case '-':
                $result = $this->subtract($number1, $number2);
                break;
            case '*':
                $result = $this->multiply($number1, $number2);
                break;
            case '/':
                $result = $this->divide($number1, $number2);
                break;
            default:
                throw new \InvalidArgumentException('Invalid operator');
                break;
        }

        return $result;
    }

    /**
     * Addition
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    private function add(float $number1, float $number2): float
    {
        return $number1 + $number2;
    }

    /**
     * Subtraction
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    private function subtract(float $number1, float $number2): float
    {
        return $number1 - $number2;
    }

    /**
     * Multiplication
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    private function multiply(float $number1, float $number2): float
    {
        return $number1 * $number2;
    }

    /**
     * Division
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    private function divide(float $number1, float $number2): float
    {
        // Throw an exception if the divisor is zero
        if ($number2 == self::INPUT_ZERO) {
            throw new \DivisionByZeroError('Division by zero is not allowed.');
        }
        return $number1 / $number2;
    }

    /**
     * Square root operation
     *
     * @param float $number1
     * @return float
     */
    private function sqrt(float $number1): float
    {
        // Throw an exception if the input is less than zero
        if ($number1 < self::INPUT_ZERO) {
            throw new \InvalidArgumentException('Invalid input for square root function');
        }
        return sqrt($number1);
    }
}
