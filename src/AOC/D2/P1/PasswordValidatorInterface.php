<?php

namespace AOC\D2\P1;

/**
 * Interface PasswordValidatorInterface
 *
 * @package AOC\D2\P1
 */
interface PasswordValidatorInterface
{
    /**
     * @param Password $password
     *
     * @return bool
     */
    public function isValid(Password $password): bool;
}
