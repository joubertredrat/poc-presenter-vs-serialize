<?php

namespace App\Domain\Repository;

use App\Domain\Model\Invoice;

/**
 * Invoice Repository Interface
 *
 * @package App\Domain\Repository
 */
interface InvoiceRepositoryInterface
{
    /**
     * @return array<Invoice>
     */
    public function list(): array;

    /**
     * @param int $id
     * @return Invoice|null
     */
    public function get(int $id): ?Invoice;
}
