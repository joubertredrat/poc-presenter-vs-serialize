<?php

namespace App\Infrastructure\Fixtures;

use App\Domain\Model\Invoice;
use App\Domain\ValueObject\Amount;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Invoice Fixtures
 *
 * @package App\Infrastructure\Fixtures
 */
class InvoiceFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $invoice1 = new Invoice();
        $invoice1->setObservations('Mussum Ipsum, cacilds vidis litro abertis');
        $invoice1->setStatusPaid();

        $amount1Cost = new Amount();
        $amount1Cost->setValue(31725);
        $amount1Cost->setCurrencyBRL();
        $invoice1->setAmountCost($amount1Cost);

        $amount1Fee = new Amount();
        $amount1Fee->setValue(0);
        $amount1Fee->setCurrencyBRL();
        $invoice1->setAmountFee($amount1Fee);

        $invoice1->forgeCreatedAt();
        $invoice1->forgeUpdatedAt();

        $manager->persist($invoice1);

        $invoice2 = new Invoice();
        $invoice2->setStatusPaid();

        $amount2Cost = new Amount();
        $amount2Cost->setValue(1270000);
        $amount2Cost->setCurrencyBRL();
        $invoice2->setAmountCost($amount2Cost);

        $amount2Fee = new Amount();
        $amount2Fee->setValue(1000);
        $amount2Fee->setCurrencyBRL();
        $invoice2->setAmountFee($amount2Fee);

        $amount2Discount = new Amount();
        $amount2Discount->setValue(1000);
        $amount2Discount->setCurrencyBRL();
        $invoice2->setAmountDiscount($amount2Discount);

        $invoice2->forgeCreatedAt();

        $manager->persist($invoice2);

        $invoice3 = new Invoice();
        $invoice3->setStatusPaid();
        $invoice3->setObservations('Foo Bar Baz Qux Quux');

        $amount3Cost = new Amount();
        $amount3Cost->setValue(14520);
        $amount3Cost->setCurrencyBRL();
        $invoice3->setAmountCost($amount3Cost);

        $amount3Fee = new Amount();
        $amount3Fee->setValue(751);
        $amount3Fee->setCurrencyBRL();
        $invoice3->setAmountFee($amount3Fee);

        $invoice3->forgeCreatedAt();

        $manager->persist($invoice3);

        $invoice4 = new Invoice();
        $invoice4->setStatusAvailable();

        $amount4Cost = new Amount();
        $amount4Cost->setValue(29990);
        $amount4Cost->setCurrencyBRL();
        $invoice4->setAmountCost($amount4Cost);

        $amount4Fee = new Amount();
        $amount4Fee->setValue(995);
        $amount4Fee->setCurrencyBRL();
        $invoice4->setAmountFee($amount4Fee);

        $amount4Discount = new Amount();
        $amount4Discount->setValue(500);
        $amount4Discount->setCurrencyBRL();
        $invoice4->setAmountDiscount($amount4Discount);

        $invoice4->forgeCreatedAt();
        $invoice4->forgeUpdatedAt();

        $manager->persist($invoice4);

        $manager->flush();
    }
}
