<?php

namespace AOC\D3\P1;

use AOC\Helper\InputReader;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$data = InputReader::fileToLines(__DIR__ . '/../input.txt');

// duplicate the landscape 5 times to the right (as it repeats)
foreach ($data as &$line) {
    $line = str_split($line);
    for ($i = 0; $i < 5; $i++) {
        $line = array_merge($line, $line);
    }
}

$treeCounter = new TreeCounter(new Grid($data));
$treeCount = $treeCounter->getTreeCount(['R3', 'D1']);

echo "Part 1 is $treeCount\n";