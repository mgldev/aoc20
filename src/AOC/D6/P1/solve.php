<?php

namespace AOC\D6\P1;

require __DIR__ . '/../../../../vendor/autoload.php';

$totalAnsweredQuestions = array_sum(
    array_map(
        fn (Group $group) => $group->getTotalAnsweredQuestions(),
        GroupParser::parse(__DIR__ . '/../input.txt')
    )
);

echo 'Part 1: ' . $totalAnsweredQuestions . "\n";
