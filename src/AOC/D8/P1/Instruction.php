<?php

namespace AOC\D8\P1;

/**
 * Class Instruction
 *
 * @package AOC\D8\D1
 */
class Instruction
{
    /** @var string */
    private string $command;

    /** @var string */
    private string $operand;

    /** @var int */
    private int $value;

    /**
     * Instruction constructor.
     *
     * @param string $instruction
     */
    public function __construct(string $instruction)
    {
        $pattern = '/(?<command>nop|jmp|acc) (?<operand>[+-])(?<value>[0-9]+)/';
        $matches = [];
        preg_match($pattern, $instruction, $matches);

        $this->command = $matches['command'];
        $this->operand = $matches['operand'];
        $this->value = (int) $matches['value'];
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     *
     * @return Instruction
     */
    public function setCommand(string $command): Instruction
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperand(): string
    {
        return $this->operand;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
