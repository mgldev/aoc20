<?php

namespace AOC\D8\P1;

require_once __DIR__ . '/../../../../vendor/autoload.php';

try {
    (new Console)->execute(Program::fromFile(__DIR__ . '/../input.txt'));
} catch (InfiniteLoopException $infiniteLoopException) {
    echo 'Part 1: ' . $infiniteLoopException->getAccumulatorValue() . "\n";
}
