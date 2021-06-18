<?php

namespace AOC\D7\P1;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$builder = new BagBuilder();
$bagCollection = $builder->build(__DIR__ . '/../input.txt');

echo 'Part 1: ' . $bagCollection->countBagsSupportingColour('shiny gold') . "\n";
