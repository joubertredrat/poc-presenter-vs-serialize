<?php

namespace App\Application\Presenter;

use App\Domain\Model\Invoice;
use App\Domain\ValueObject\Amount;

/**
 * Invoice Presenter
 *
 * @package App\Application\Presenter
 */
class InvoicePresenter implements PresenterInterface
{
    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * Invoice Presenter constructor
     *
     * @param Invoice $invoice
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $invoice = $this->invoice;

        return [
            'id' => $invoice->getId(),
            'observations' => $invoice->getObservations(),
            'status' => $invoice->getStatus(),
            'amountCost' => $this->amountToArray(
                $invoice->getAmountCost()
            ),
            'amountFee' => $this->amountToArray(
                $invoice->getAmountFee()
            ),
            'amountDiscount' => $this->amountToArray(
                $invoice->getAmountDiscount()
            ),
            'createdAt' => [
                'canonical' => $invoice->getCreatedAtString(),
                'ptBr' => $invoice->getCreatedAtString('d/m/Y H:i:s'),
            ],
            'updatedAt' => [
                'canonical' => $invoice->getUpdatedAtString(),
                'ptBr' => $invoice->getUpdatedAtString('d/m/Y H:i:s'),
            ],
        ];
    }

    /**
     * @param Amount $amount
     * @return array
     */
    private function amountToArray(Amount $amount): array
    {
        return [
            'value' => $amount->getValue(),
            'valueFloat' => $amount->getValueFloat(),
            'currency' => $amount->getCurrency(),
        ];
    }
}
