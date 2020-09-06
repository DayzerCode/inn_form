<?php


namespace App\Contracts\Services;


interface TaxpayerServiceContract
{
    public function getStatusInn(string $inn);
}
