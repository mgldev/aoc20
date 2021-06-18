<?php

namespace AOC\D6\P1;

/**
 * Class GroupParser
 *
 * @package AOC\D6\P1
 */
class GroupParser
{
    /**
     * @param string $filename
     *
     * @return Group[]
     */
    public static function parse(string $filename): array
    {
        $lines = file($filename);
        $groups = [];
        $group = new Group();
        $maxIndex = count($lines) - 1;

        foreach ($lines as $index => $line) {
            $isLastLine = $index === $maxIndex;

            if (self::isBlankLine($line)) {
                $groups[] = $group;
                $group = new Group();
                continue;
            }

            $participant = new Participant();
            $participant->setAnswersFromString($line);
            $group->addParticipant($participant);

            if ($isLastLine) {
                $groups[] = $group;
            }
        }

        return $groups;
    }

    /**
     * @param string $line
     *
     * @return bool
     */
    private static function isBlankLine(string $line): bool
    {
        return $line === "\n" || $line === "\r\n";
    }
}
