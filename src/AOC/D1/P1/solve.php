<?php

namespace AOC\D1\P1;

use AOC\Helper\InputReader;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$numbers = InputReader::fileToLines(__DIR__ . '/input.txt');
$matches = array_values(array_intersect(array_map(fn ($number) => 2020 - $number, $numbers), $numbers));
$answer = array_product($matches);

die('Part 1 is ' . $answer . "\n");