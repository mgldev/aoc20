<?php

namespace AOC\D6\P2;

use AOC\D6\P1\Group;
use AOC\D6\P1\GroupParser;

require __DIR__ . '/../../../../vendor/autoload.php';

$totalUnanimouslyAnsweredQuestions = array_sum(
    array_map(
        fn (Group $group) => $group->getUnanimouslyAnsweredQuestionCount(),
        GroupParser::parse(__DIR__ . '/../input.txt')
    )
);

echo 'Part 2: ' . $totalUnanimouslyAnsweredQuestions . "\n";
