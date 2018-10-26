<?php

namespace App\Application\Service;

use App\Domain\Exception\Service\InvoiceService\InvoiceNotFoundException;
use App\Domain\Model\Invoice;
use App\Domain\Repository\InvoiceRepositoryInterface;
use App\Domain\Service\InvoiceServiceInterface;

/**
 * Invoice Service
 *
 * @package App\Application\Service
 */
class InvoiceService implements InvoiceServiceInterface
{
    /**
     * @var InvoiceRepositoryInterface
     */
    private $invoiceRepository;

    /**
     * Invoice Service constructor
     *
     * @param InvoiceRepositoryInterface $invoiceRepository
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function invoiceList(): array
    {
        return $this
            ->invoiceRepository
            ->list()
        ;
    }

    /**
     * {@inheritdoc}
     * @throws InvoiceNotFoundException
     */
    public function invoiceGet(int $id): Invoice
    {
        $invoice = $this
            ->invoiceRepository
            ->get($id)
        ;

        if (!$invoice instanceof Invoice) {
            throw InvoiceNotFoundException::onDatabase($id);
        }

        return $invoice;
    }
}
