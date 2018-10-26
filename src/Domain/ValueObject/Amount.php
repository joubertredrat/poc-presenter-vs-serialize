<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\ValueObject\Amount\InvalidCurrencyException;
use App\Domain\Exception\ValueObject\Amount\InvalidValueException;

/**
 * Amount
 *
 * @package App\Domain\ValueObject
 */
class Amount
{
    /**
     * Currencies
     */
    const CURRENCY_BRL = 'BRL';

    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $currency;

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getValueFloat(): ?string
    {
        if (is_null($this->getValue())) {
            return null;
        }

        if (100 > $this->getValue()) {
            return '0.' . (string) $this->getValue();
        }

        $valueString = (string) $this->getValue();

        return substr($valueString, 0, -2) . '.' . substr($valueString, -2);
    }

    /**
     * @param int $value
     * @return void
     * @throws InvalidValueException
     */
    public function setValue(int $value): void
    {
        if ($value < 0) {
            throw InvalidValueException::negativeValue($value);
        }

        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return void
     * @throws InvalidCurrencyException
     */
    public function setCurrency(string $currency): void
    {
        if (!self::isValidCurrency($currency)) {
            throw InvalidCurrencyException::invalidISO4217(
                $currency,
                self::getCurrencyAvailable()
            );
        }

        $this->currency = $currency;
    }

    /**
     * @return void
     * @throws InvalidCurrencyException
     */
    public function setCurrencyBRL(): void
    {
        $this->setCurrency(self::CURRENCY_BRL);
    }

    /**
     * @return array
     */
    public static function getCurrencyAvailable(): array
    {
        return [
            self::CURRENCY_BRL,
        ];
    }

    /**
     * @param string $currency
     * @return bool
     */
    public static function isValidCurrency(string $currency): bool
    {
        return in_array($currency, self::getCurrencyAvailable());
    }

    /**
     * @param string $value
     * @return int
     */
    public static function convertFloatToCents(string $value): int
    {
        return (int) preg_replace('/\D/', '', $value);
    }
}
