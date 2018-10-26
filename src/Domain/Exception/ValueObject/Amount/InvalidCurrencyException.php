<?php

namespace App\Domain\Exception\ValueObject\Amount;

/**
 * InvalidCurrency Exception
 *
 * @package App\Domain\Exception\ValueObject\Amount
 */
class InvalidCurrencyException extends \InvalidArgumentException
{
    /**
     * @param string $currency
     * @param array $currenciesAvailable
     * @return InvalidCurrencyException
     * @see https://pt.wikipedia.org/wiki/ISO_4217
     */
    public static function invalidISO4217(string $currency, array $currenciesAvailable): self
    {
        return new self(
            sprintf(
                'Invalid ISO 4217 currency: %s. Available currencies: %s',
                $currency,
                implode(', ', $currenciesAvailable)
            )
        );
    }
}
