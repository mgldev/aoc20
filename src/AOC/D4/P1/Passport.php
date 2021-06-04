<?php

namespace AOC\D4\P1;

/**
 * Class Passport
 *
 * @package AOC\D4\P1
 */
class Passport
{
    /**
     * A collection of attributes this passport holds, e.g. 'hgt', 'byr', 'eyr', and their values
     *
     * [
     *      'byr' => 1978,
     *      'hgt' => '178cm'
     * ]
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * The defined list of mandatory passport attributes, each with a validation lambda function
     *
     * @var array
     */
    protected array $requiredAttributes = [];

    /**
     * Passport constructor.
     */
    public function __construct()
    {
        $this->defineRequiredAttributes();
    }

    /**
     * Define the required attributes and their validation rule(s)
     */
    private function defineRequiredAttributes()
    {
        $this->requiredAttributes = [
            'byr' => fn ($value) => $value >= 1920 && $value <= 2002,
            'iyr' => fn ($value) => $value >= 2010 && $value <= 2020,
            'eyr' => fn ($value) => $value >= 2020 && $value <= 2030,
            'hgt' => function ($value) {
                $pattern = '/(?<height>[0-9]+)(?<unit>cm|in)/';
                $matches = [];

                if (preg_match($pattern, $value, $matches) > 0) {
                    $height = $matches['height'];
                    $unit = $matches['unit'];
                    switch ($unit) {
                        case 'cm':
                            return $height >= 150 && $height <= 193;

                        case 'in':
                            return $height >= 59 && $height <= 76;

                        default:
                            return false;
                    }
                }

                return false;
            },
            'hcl' => fn ($value) => preg_match('/^#[0-9a-f]{6}$/', $value) > 0,
            'ecl' => fn ($value) => in_array($value, ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth']),
            'pid' => fn ($value) => preg_match('/^[0-9]{9}$/', $value) > 0,
        ];
    }

    /**
     * Add an attribute
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addAttribute(string $key, string $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Get an attribute's value
     *
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute(string $key)
    {
        return $this->attributes[$key] ?? null;
    }

    /**
     * Add attributes to this passport from a provided input line, e.g.
     *
     * "hgt: 158cm, eyr: 2025, byr: 1978"
     *
     * @param string $line
     *
     * @return $this
     */
    public function addAttributesFromLine(string $line): self
    {
        $pattern = '/(?<key>[a-zA-Z0-9#]+):(?<value>[a-zA-Z0-9#]+)/';
        $matches = [];

        if (preg_match_all($pattern, $line, $matches) > 0) {
            foreach ($matches['key'] as $index => $key) {
                $value = $matches['value'][$index];
                $this->addAttribute($key, $value);
            }
        }

        return $this;
    }

    /**
     * Determine if this passport, based on inner attributes, is valid
     *
     * @param bool $performValueValidation  A flag to indicate the attribute's value should be valid, in addition to
     *                                      the attribute being required
     *
     * @return bool
     */
    public function isValid(bool $performValueValidation = false): bool
    {
        foreach ($this->requiredAttributes as $key => $validator) {
            if ((($value = $this->getAttribute($key)) === null) || (!$validator($value) && $performValueValidation)) {
                return false;
            }
        }

        return true;
    }
}
