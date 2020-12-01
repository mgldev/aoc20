<?php

namespace AOC\D1\P2;

use AOC\Helper\InputReader;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$numbers = InputReader::fileToLines(__DIR__ . '/../P1/input.txt');

$matches = array_merge(...array_map(
    function ($number) use ($numbers) {
        $values = [];
        foreach ($numbers as $thirdNumber) {
            $values[] = 2020 - $number - $thirdNumber;
        }
        return $values;
    },
    $numbers
));

$matches = array_values(array_unique(array_intersect($matches, $numbers)));
$answer = array_product($matches);

die('Part 2 is ' . $answer . "\n");