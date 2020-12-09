<?php

namespace AOC\D2\P1;

/**
 * Class PasswordPolicy
 *
 * @package AOC\D2\P1
 */
class PasswordPolicy
{
    /** @var int */
    private int $argumentOne;

    /** @var int */
    private int $argumentTwo;

    /** @var string */
    private string $character;

    /**
     * PasswordPolicy constructor.
     *
     * @param int $argumentOne
     * @param int $argumentTwo
     * @param string $character
     */
    public function __construct(int $argumentOne, int $argumentTwo, string $character)
    {
        $this->argumentOne = $argumentOne;
        $this->argumentTwo = $argumentTwo;
        $this->character = $character;
    }

    /**
     * @return int
     */
    public function getArgumentOne(): int
    {
        return $this->argumentOne;
    }

    /**
     * @return int
     */
    public function getArgumentTwo(): int
    {
        return $this->argumentTwo;
    }

    /**
     * @return string
     */
    public function getCharacter(): string
    {
        return $this->character;
    }
}
