<?php

namespace App\Domain\Model;

use App\Domain\Exception\Model\Invoice\InvalidStatusException;
use App\Domain\ValueObject\Amount;
use RedRat\Entity\DateTimeTrait;

/**
 * Invoice
 *
 * @package App\Domain\Model
 */
class Invoice
{
    use DateTimeTrait;

    /**
     * Available status
     */
    const STATUS_AVAILABLE = 'available';
    const STATUS_PAID = 'paid';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $observations;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Amount
     */
    private $amountCost;

    /**
     * @var Amount
     */
    private $amountFee;

    /**
     * @var Amount
     */
    private $amountDiscount;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getObservations(): ?string
    {
        return $this->observations;
    }

    /**
     * @param string $observations
     * @return void
     */
    public function setObservations(string $observations): void
    {
        $this->observations = $observations;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return void
     */
    public function setStatus(string $status): void
    {
        if (!self::isValidStatus($status)) {
            throw InvalidStatusException::invalidName(
                $status,
                self::getStatusAvailable()
            );
        }

        $this->status = $status;
    }

    /**
     * @return void
     */
    public function setStatusAvailable(): void
    {
        $this->setStatus(self::STATUS_AVAILABLE);
    }

    /**
     * @return void
     */
    public function setStatusPaid(): void
    {
        $this->setStatus(self::STATUS_PAID);
    }

    /**
     * @return Amount
     */
    public function getAmountCost(): Amount
    {
        return $this->amountCost;
    }

    /**
     * @param Amount $amountCost
     * @return void
     */
    public function setAmountCost(Amount $amountCost): void
    {
        $this->amountCost = $amountCost;
    }

    /**
     * @return bool
     */
    public function hasAmountCost(): bool
    {
        return $this->getAmountCost() instanceof Amount;
    }

    /**
     * @return Amount|null
     */
    public function getAmountFee(): ?Amount
    {
        return $this->amountFee;
    }

    /**
     * @param Amount $amountFee
     * @return void
     */
    public function setAmountFee(Amount $amountFee): void
    {
        $this->amountFee = $amountFee;
    }

    /**
     * @return bool
     */
    public function hasAmountFee(): bool
    {
        return $this->getAmountFee() instanceof Amount;
    }

    /**
     * @return Amount|null
     */
    public function getAmountDiscount(): ?Amount
    {
        return $this->amountDiscount;
    }

    /**
     * @param Amount $amountDiscount
     * @return void
     */
    public function setAmountDiscount(Amount $amountDiscount): void
    {
        $this->amountDiscount = $amountDiscount;
    }

    /**
     * @return bool
     */
    public function hasAmountDiscount(): bool
    {
        return $this->getAmountDiscount() instanceof Amount;
    }

    /**
     * @return array
     */
    public static function getStatusAvailable(): array
    {
        return [
            self::STATUS_AVAILABLE,
            self::STATUS_PAID,
        ];
    }

    /**
     * @param string $status
     * @return bool
     */
    public static function isValidStatus(string $status): bool
    {
        return in_array($status, self::getStatusAvailable());
    }
}
