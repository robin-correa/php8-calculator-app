# PHP 8 Calculator App

Welcome to the PHP 8 (8.2.5) Calculator App! This application provides basic arithmetic operations and square root calculations. It is implemented in PHP 8 and is designed for simplicity and ease of use.

## Features

- Addition
- Subtraction
- Multiplication
- Division (with zero division handling)
- Square root calculation (with validation for negative inputs)

## Installation

1. **Clone the repository:**

   ```sh
   git clone https://github.com/robin-correa/php8-calculator-app.git
   ```

2. **Install dependencies (PHPUnit)**
```sh
composer install
```

3. **Run PHPUnit** (Unit tests)
```sh
vendor\bin\phpunit tests --color
```

## Running the application
Note: The application will prompt you to enter calculations. It will continue running and processing calculations until you type "exit" and press Enter.

   ```sh
   php index.php
   ```

## Usage
- Addition
    - Input: 11 + 21
    - Output: 32
- Subtraction
    - Input: 11 - 21
    - Output: 10
- Multiplication
    - Input: 11 * 21
    - Output: 231
- Division (with zero division handling)
    - Input1: 231 / 21
    - Output1: 11
    - Input2: 231 / 0
    - Output2: DivisionByZeroError (Error exception)
- Square root calculation (with validation for negative inputs)
    - Input1: 9 sqrt
    - Output2: 3
    - Input2: -9 sqrt
    - Output2: Error: Invalid input for square root function

## Author
**Robin Correa**

Email: robin.correa21@gmail.com