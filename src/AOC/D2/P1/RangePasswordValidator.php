<?php

namespace AOC\D2\P1;

/**
 * Class RangePasswordValidator
 *
 * @package AOC\D2\P1
 */
class RangePasswordValidator implements PasswordValidatorInterface
{
    /**
     * @param Password $password
     *
     * @return bool
     */
    public function isValid(Password $password): bool
    {
        $policy = $password->getPolicy();
        $occurrences = substr_count($password, $policy->getCharacter());

        return $occurrences >= $policy->getArgumentOne() && $occurrences <= $policy->getArgumentTwo();
    }
}
