<?php

namespace AOC\D4\P1;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$passports = PassportParser::parse(__DIR__ . '/../input.txt');

// find all passports based purely on mandatory passport fields
$validPassports = array_filter($passports, fn(Passport $passport) => $passport->isValid(false));

echo 'Part 1: There are ' . count($validPassports) . ' valid passports';