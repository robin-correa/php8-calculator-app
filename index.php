<?php

/**
 * Calculator main entrypoint
 *
 * 
 * @author Robin Correa <robin.correa21@gmail.com>
 */

require 'vendor/autoload.php';

use Robincorrea\Php8CalculatorApp\Classes\Calculator;

$calculator = new Calculator();

echo "Simple PHP CLI Calculator by Robin Correa\n";
echo "Type 'exit' to exit the application\n";

// Run the calculator application
while (true) {
    echo "Enter calculation: ";
    $input = trim(fgets(STDIN));

    // Input "exit" to terminate the application
    if (strtolower($input) === Calculator::INPUT_EXIT) {
        echo "Thanks, bye.\n";
        break;
    }

    try {
        $result = $calculator->calculate($input);
        echo "Answer: " . $result . PHP_EOL;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . PHP_EOL;
    }
}