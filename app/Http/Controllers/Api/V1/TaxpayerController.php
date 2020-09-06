<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StatusNdpRequest;
use App\Services\TaxpayerService;
use Symfony\Component\HttpFoundation\Response;

class TaxpayerController
{
    public function getStatusInn(StatusNdpRequest $request, TaxpayerService $service)
    {
        $response = $service->getStatusInn($request->get('inn'));
        if ($response['status'] === 'success') {
            return \Response::json($response, Response::HTTP_OK);
        } else {
            return \Response::json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
