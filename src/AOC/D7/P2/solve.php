<?php

namespace AOC\D7\P2;

use AOC\D7\P1\BagBuilder;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$builder = new BagBuilder();
$bagCollection = $builder->build(__DIR__ . '/../input.txt');

$totalBags = $bagCollection->getBag('shiny gold')->calculateTotalCompositeBags();

echo 'Part 2: ' . $totalBags . "\n";
