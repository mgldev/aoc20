<?php

namespace AOC\D8\P1;

/**
 * Class Program
 *
 * @package AOC\D8\D1
 */
class Program
{
    /** @var Instruction[] */
    private array $instructions = [];

    /**
     * Program constructor.
     *
     * @param array $instructions
     */
    public function __construct(array $instructions)
    {
        foreach ($instructions as $instruction) {
            $this->addInstruction($instruction);
        }
    }

    /**
     * @param Instruction $instruction
     *
     * @return $this
     */
    private function addInstruction(Instruction $instruction): self
    {
        $this->instructions[] = $instruction;

        return $this;
    }

    /**
     * @param int $position
     *
     * @return Instruction
     */
    public function getInstruction(int $position): ?Instruction
    {
        return $this->instructions[$position] ?? null;
    }

    /**
     * @param array $commands
     *
     * @return Instruction[]
     */
    public function filter(array $commands): array
    {
        return array_filter(
            $this->instructions,
            fn (Instruction $instruction) => in_array($instruction->getCommand(), $commands)
        );
    }

    /**
     * @param int $position
     * @param Instruction $instruction
     *
     * @return $this
     */
    public function setInstruction(int $position, Instruction $instruction): self
    {
        $this->instructions[$position] = $instruction;

        return $this;
    }

    /**
     * @return int
     */
    public function getInstructionCount(): int
    {
        return count($this->instructions);
    }

    /**
     * @param string $programFilename
     *
     * @return Program
     */
    public static function fromFile(string $programFilename): self
    {
        $lines = file($programFilename);

        $instructions = [];

        foreach ($lines as $line) {
            $instructions[] = new Instruction($line);
        }

        return new self($instructions);
    }
}
