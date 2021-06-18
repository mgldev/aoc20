<?php

namespace AOC\D6\P1;

/**
 * Class Participant
 *
 * @package AOC\D6\P1
 */
class Participant
{
    /** @var string[] */
    private array $answeredQuestions;

    /**
     * @param string $answers
     *
     * @return $this
     */
    public function setAnswersFromString(string $answers): self
    {
        $this->answeredQuestions = str_split(trim($answers));

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAnsweredQuestions(): array
    {
        return $this->answeredQuestions;
    }
}
