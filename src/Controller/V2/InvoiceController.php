<?php

namespace App\Controller\V2;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Invoice Controller
 *
 * @package App\Controller\V2
 */
class InvoiceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function listAction(): JsonResponse
    {
        return new JsonResponse(['time' => time()]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getAction(int $id): JsonResponse
    {
        return new JsonResponse(['time' => time(), 'id' => $id]);
    }
}
