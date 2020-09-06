<?php


namespace App\Contracts\Services\Api;


use DateTimeInterface;

interface TaxpayerApi
{
    public function getStatusInn(string $inn, DateTimeInterface $date = null) : array;
}
