<?php

namespace AOC\D2\P2;

use AOC\D2\P1\Password;
use AOC\D2\P1\PasswordValidatorInterface;

/**
 * Class PositionBasedPasswordPolicy
 *
 * @package AOC\D2\P2
 */
class PositionBasedPasswordPolicy implements PasswordValidatorInterface
{
    /**
     * @param Password $password
     *
     * @return bool
     */
    public function isValid(Password $password): bool
    {
        $policy = $password->getPolicy();
        $characters = str_split($password);
        $character = $policy->getCharacter();
        $characterOne = $characters[$policy->getArgumentOne() - 1];
        $characterTwo = $characters[$policy->getArgumentTwo() - 1];

        return ($characterOne == $character || $characterTwo == $character) && $characterOne !== $characterTwo;
    }
}
