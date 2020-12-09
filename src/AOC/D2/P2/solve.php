<?php

namespace AOC\D2\P2;

use AOC\D2\P1\PasswordFactory;
use AOC\Helper\InputReader;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$passwordConfigLines = InputReader::fileToLines(__DIR__ . '/../input.txt');

$validPasswords = 0;

foreach ($passwordConfigLines as $passwordConfigLine) {
    $password = PasswordFactory::createFromString($passwordConfigLine, new PositionBasedPasswordPolicy);
    $validPasswords += (int) $password->isValid();
}

echo "Part 2 is $validPasswords\n";