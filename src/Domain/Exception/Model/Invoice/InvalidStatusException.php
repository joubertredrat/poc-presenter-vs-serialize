<?php

namespace App\Domain\Exception\Model\Invoice;

/**
 * InvalidStatus Exception
 *
 * @package App\Domain\Exception\Model\Invoice
 */
class InvalidStatusException extends \InvalidArgumentException
{
    /**
     * @param string $name
     * @param array $statusAvailable
     * @return InvalidStatusException
     */
    public static function invalidName(string $name, array $statusAvailable): self
    {
        return new self(
            sprintf(
                'Invalid status name: %s. Available status: %s',
                $name,
                implode(', ', $statusAvailable)
            )
        );
    }
}
