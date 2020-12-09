<?php

namespace AOC\D2\P1;

/**
 * Class Password
 *
 * @package AOC\D2\P1
 */
class Password
{
    /** @var string */
    private string $password;

    /** @var PasswordPolicy */
    private PasswordPolicy $policy;

    /** @var PasswordValidatorInterface */
    private PasswordValidatorInterface $validator;

    /**
     * Password constructor.
     *
     * @param string $password
     * @param PasswordPolicy $policy
     * @param PasswordValidatorInterface $validator
     */
    public function __construct(string $password, PasswordPolicy $policy, PasswordValidatorInterface $validator)
    {
        $this->password = $password;
        $this->policy = $policy;
        $this->validator = $validator;
    }

    /**
     * @return PasswordPolicy
     */
    public function getPolicy(): PasswordPolicy
    {
        return $this->policy;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->validator->isValid($this);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->password;
    }
}
