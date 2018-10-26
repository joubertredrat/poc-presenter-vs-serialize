<?php

namespace App\Domain\Exception\Service\InvoiceService;

/**
 * InvoiceNotFound Exception
 *
 * @package App\Domain\Exception\Service\InvoiceService
 */
class InvoiceNotFoundException extends \Exception
{
    /**
     * @param int $id
     * @return InvoiceNotFoundException
     */
    public static function onDatabase(int $id): self
    {
        return new self(
            sprintf('Invoice not found on database: %d', $id)
        );
    }
}
