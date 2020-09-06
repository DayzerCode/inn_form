<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StatusNdpRequest;
use App\Services\TaxpayerService;

class TaxpayerController
{
    public function getStatusInn(StatusNdpRequest $request, TaxpayerService $service)
    {
        $response = $service->getStatusInn($request->get('inn'));
        return \Response::json($response);
    }
}
