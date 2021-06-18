<?php

namespace AOC\D8\P2;

use AOC\D8\P1\Console;
use AOC\D8\P1\Program;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$accumulatorValue = (new ProgramRepairer(new Console))->repair(Program::fromFile(__DIR__ . '/../input.txt'));

echo 'Part 2: ' . $accumulatorValue . "\n";