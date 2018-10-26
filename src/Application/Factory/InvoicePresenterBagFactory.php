<?php

namespace App\Application\Factory;

use App\Application\Presenter\InvoicePresenter;
use App\Application\Presenter\PresenterBag;
use App\Domain\Model\Invoice;

/**
 * InvoicePresenterBag Factory
 *
 * @package App\Application\Factory
 */
class InvoicePresenterBagFactory
{
    /**
     * @param array<Invoice> $data
     * @return PresenterBag
     */
    public static function createFromServiceResponse(array $data): PresenterBag
    {
        $presenterBag = new PresenterBag();

        foreach ($data as $item) {
            if ($item instanceof Invoice) {
                $presenterBag->add(
                    new InvoicePresenter($item)
                );
            }
        }

        return $presenterBag;
    }
}
