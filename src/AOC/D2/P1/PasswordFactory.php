<?php

namespace AOC\D2\P1;

use InvalidArgumentException;

/**
 * Class PasswordFactory
 *
 * @package AOC\D2\P1
 */
class PasswordFactory
{
    /**
     * @param string $passwordConfigLine
     * @param PasswordValidatorInterface $validator
     *
     * @return Password
     */
    public static function createFromString(string $passwordConfigLine, PasswordValidatorInterface $validator): Password
    {
        $matches = [];
        $pattern = '/(?<arg1>\d{1,2})-(?<arg2>\d{1,2}) (?<char>[a-z]{1}): (?<password>[a-z]+)/';
        $matched = preg_match($pattern, $passwordConfigLine, $matches);

        if (!$matched) {
            throw new InvalidArgumentException('Invalid password line provided');
        }

        $argumentOne = (int) $matches['arg1'];
        $argumentTwo = (int) $matches['arg2'];
        $character = $matches['char'];
        $password = $matches['password'];

        $policy = new PasswordPolicy($argumentOne, $argumentTwo, $character);

        return new Password($password, $policy, $validator);
    }
}
