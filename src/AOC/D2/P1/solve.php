<?php

namespace AOC\D2\P1;

use AOC\Helper\InputReader;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$passwordConfigLines = InputReader::fileToLines(__DIR__ . '/../input.txt');

$validPasswords = 0;

foreach ($passwordConfigLines as $passwordConfigLine) {
    $password = PasswordFactory::createFromString($passwordConfigLine, new RangePasswordValidator);
    $validPasswords += (int) $password->isValid();
}

echo "Part 1 is $validPasswords\n";