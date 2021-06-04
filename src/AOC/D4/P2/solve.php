<?php

namespace AOC\D4\P1;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$passports = PassportParser::parse(__DIR__ . '/../input.txt');

// find all passports based on mandatory fields _and_ valid values
$validPassports = array_filter($passports, fn(Passport $passport) => $passport->isValid(true));

echo 'Part 2: There are ' . count($validPassports) . ' valid passports';