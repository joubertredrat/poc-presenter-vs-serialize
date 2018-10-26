<?php

namespace App\Domain\Exception\ValueObject\Amount;

/**
 * InvalidValue Exception
 *
 * @package App\Domain\Exception\ValueObject\Amount
 */
class InvalidValueException extends \InvalidArgumentException
{
    /**
     * @param int $id
     * @return InvalidValueException
     */
    public static function negativeValue(int $id): self
    {
        return new self(
            sprintf('Value less than 0: %d', $id)
        );
    }
}
