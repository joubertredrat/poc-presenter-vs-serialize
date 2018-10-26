<?php

namespace App\Controller\V1;

use App\Application\Factory\InvoicePresenterBagFactory;
use App\Application\Presenter\InvoicePresenter;
use App\Domain\Exception\Service\InvoiceService\InvoiceNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Invoice Controller
 *
 * @package App\Controller\V1
 */
class InvoiceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function listAction(): JsonResponse
    {
        try {
            $service = $this->get('app.infrastructure.service.invoice');
            $data = $service->invoiceList();
            $presenterBag = InvoicePresenterBagFactory::createFromServiceResponse($data);

            return new JsonResponse($presenterBag->toArray());
        } catch (\Throwable $e) {
            return new JsonResponse(
                $e->getMessage(),
                JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getAction(int $id): JsonResponse
    {
        try {
            $service = $this->get('app.infrastructure.service.invoice');
            $invoice = $service->invoiceGet($id);
            $invoicePresenter = new InvoicePresenter($invoice);

            return new JsonResponse($invoicePresenter->toArray());
        } catch (InvoiceNotFoundException $e) {
            return new JsonResponse(
                $e->getMessage(),
                JsonResponse::HTTP_NOT_FOUND
            );
        } catch (\Throwable $e) {
            return new JsonResponse(
                $e->getMessage(),
                JsonResponse::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
