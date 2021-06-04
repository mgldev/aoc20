<?php

namespace AOC\D4\P1;

/**
 * Class PassportParser
 *
 * @package AOC\D4\P1
 */
class PassportParser
{
    /**
     * Parse the specified input filename to a collection of Passport instances
     *
     * @param string $filename
     *
     * @return Passport[]
     */
    public static function parse(string $filename): array
    {
        $lines = file($filename);
        $passports = [];
        $passport = new Passport();
        $maxIndex = count($lines) - 1;

        foreach ($lines as $index => $line) {
            $isBlankLine = $line === "\n";
            $isLastLine = $index === $maxIndex;

            if ($isBlankLine) {
                $passports[] = $passport;
                $passport = new Passport();
                continue;
            } elseif ($isLastLine) {
                $passports[] = (new Passport)->addAttributesFromLine($line);
                break;
            }
            $passport->addAttributesFromLine($line);
        }

        return $passports;
    }
}
