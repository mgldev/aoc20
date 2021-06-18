<?php

namespace AOC\D9\P2;

use AOC\D9\P1\XMASParser;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$parser = new XMASParser(__DIR__ . '/../input.txt');
$contiguousSum = $parser->findContiguousSum();

echo 'Part 2: ' . $contiguousSum . "\n";
