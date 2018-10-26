<?php

namespace App\Domain\Service;

use App\Domain\Model\Invoice;

/**
 * Invoice Service Interface
 *
 * @package App\Domain\Service
 */
interface InvoiceServiceInterface
{
    /**
     * @return array<Invoice>
     */
    public function invoiceList(): array;

    /**
     * @param int $id
     * @return Invoice
     */
    public function invoiceGet(int $id): Invoice;
}
