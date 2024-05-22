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
            list($a, $operator, $b) = $expressionsArray;
            return $this->performBasicOperation((float)$a, $operator, (float)$b);
        } else {
            throw new \InvalidArgumentException('Invalid input');
        }
    }

    /**
     * Map and perform operation
     *
     * @param float $a
     * @param string $operator
     * @param float $b
     * @return float
     */
    private function performBasicOperation(float $a, string $operator, float $b): float
    {
        switch ($operator) {
            case '+':
                $result = $this->add($a, $b);
                break;
            case '-':
                $result = $this->subtract($a, $b);
                break;
            case '*':
                $result = $this->multiply($a, $b);
                break;
            case '/':
                $result = $this->divide($a, $b);
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
     * @param float $a
     * @param float $b
     * @return float
     */
    private function add(float $a, float $b): float
    {
        return $a + $b;
    }

    /**
     * Subtraction
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    private function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    /**
     * Multiplication
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    private function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    /**
     * Division
     *
     * @param float $a
     * @param float $b
     * @return float
     */
    private function divide(float $a, float $b): float
    {
        // Throw an exception if the divisor is zero
        if ($b == self::INPUT_ZERO) {
            throw new \DivisionByZeroError('Division by zero is not allowed.');
        }
        return $a / $b;
    }

    /**
     * Square root operation
     *
     * @param float $a
     * @return float
     */
    private function sqrt(float $a): float
    {
        // Throw an exception if the input is less than zero
        if ($a < self::INPUT_ZERO) {
            throw new \InvalidArgumentException('Invalid input for square root function');
        }
        return sqrt($a);
    }
}
