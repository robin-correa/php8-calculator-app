<?php

use PHPUnit\Framework\TestCase;

use Robincorrea\Php8CalculatorApp\Classes\Calculator;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAddition(): void
    {
        $this->assertEquals(32, $this->calculator->calculate('11 + 21'));
    }

    public function testSubtraction(): void
    {
        $this->assertEquals(10, $this->calculator->calculate('21 - 11'));
    }

    public function testMultiplication(): void
    {
        $this->assertEquals(10.0, $this->calculator->calculate('5 * 2'));
    }

    public function testDivision(): void
    {
        $this->assertEquals(2.5, $this->calculator->calculate('5 / 2'));
    }

    public function testSquareRoot(): void
    {
        $this->assertEquals(3.0, $this->calculator->calculate('9 sqrt'));
    }

    public function testInvalidOperator(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate('11 ^ 21');
    }

    public function testDivisionByZero(): void
    {
        $this->expectException(DivisionByZeroError::class);
        $this->calculator->calculate('21 / 0');
    }

    public function testNegativeSquareRoot(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calculate('-9 sqrt');
    }
}
