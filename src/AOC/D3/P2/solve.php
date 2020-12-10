<?php

namespace AOC\D3\P1;

use AOC\Helper\InputReader;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$data = InputReader::fileToLines(__DIR__ . '/../input.txt');

// duplicate the landscape 7 times to the right (as it repeats) - P2 needs more repeats
foreach ($data as &$line) {
    $line = str_split($line);
    for ($i = 0; $i < 7; $i++) {
        $line = array_merge($line, $line);
    }
}

$treeCounter = new TreeCounter(new Grid($data));

$slopes = [
    ['R1', 'D1'],
    ['R3', 'D1'],
    ['R5', 'D1'],
    ['R7', 'D1'],
    ['R1', 'D2'],
];

$treeCounts = [];

foreach ($slopes as $directions) {
    $treeCounts[] = $treeCounter->getTreeCount($directions);
}

$treeCountProduct = array_product($treeCounts);

echo "Part 2 is $treeCountProduct\n";