<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Invoice;
use App\Domain\Repository\InvoiceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 *  Invoice Repository
 *
 * @package App\Infrastructure\Repository
 */
class InvoiceRepository extends ServiceEntityRepository implements InvoiceRepositoryInterface
{
    /**
     * Invoice Repository constructor
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Invoice::class);
    }

    /**
     * {@inheritdoc}
     */
    public function list(): array
    {
        return $this->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $id): ?Invoice
    {
        /** @var Invoice $invoice */
        $invoice = $this->find($id);

        return $invoice;
    }
}
