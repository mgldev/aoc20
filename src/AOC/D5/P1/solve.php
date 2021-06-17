<?php

namespace AOC\D5\P1;

require_once __DIR__ . '/../../../../vendor/autoload.php';

$parser = new BoardingPassParser(new SeatResolver(new BoundaryReducer()));
$seats = $parser->getSeats(__DIR__ . '/input.txt');
$seatIds = array_map(fn (Seat $seat) => $seat->getId(), $seats);
$partOne = max($seatIds);
$partTwo = MissingSeatFinder::find($seats)->getId();

echo 'Part 1: ' . $partOne . PHP_EOL;
echo 'Part 2: ' . $partTwo . PHP_EOL;
