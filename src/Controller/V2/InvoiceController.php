<?php

namespace App\Controller\V2;

use App\Domain\Exception\Service\InvoiceService\InvoiceNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use TSantos\Serializer\SerializerInterface;

/**
 * Invoice Controller
 *
 * @package App\Controller\V2
 */
class InvoiceController extends Controller
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * InvoiceController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @return JsonResponse
     */
    public function listAction(): JsonResponse
    {
        try {
            $service = $this->get('app.infrastructure.service.invoice');
            $data = $service->invoiceList();

            return new JsonResponse($this->serializer->normalize($data));
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

            return new JsonResponse($this->serializer->normalize($invoice));
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
