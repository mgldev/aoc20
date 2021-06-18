<?php

namespace AOC\D9\P1;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$parser = new XMASParser(__DIR__ . '/../input.txt');
$invalidNumber = $parser->findInvalidNumber();

echo 'Part 1: ' . $invalidNumber . "\n";
