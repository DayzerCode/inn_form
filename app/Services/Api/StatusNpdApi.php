<?php


namespace App\Services\Api;

use App\Contracts\Services\Api\TaxpayerApi;
use DateTimeInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;

/**
 * Requests to https://statusnpd.nalog.ru/
 */
class StatusNpdApi implements TaxpayerApi
{
    private ClientInterface $client;
    private ?LoggerInterface $logManager;

    public function __construct(ClientInterface $client, LoggerInterface $logManager)
    {
        $this->client = $client;
        $this->logManager = $logManager;
    }

    public function getStatusInn(string $inn, DateTimeInterface $date = null) : array
    {
        if ($date === null) {
            $date = new \DateTime();
        }
        $parameters = [
            'inn' => $inn,
            'requestDate' => $date->format('Y-m-d'),
        ];
        try {
            $response = $this->client->request('POST', 'tracker/taxpayer_status', [
                'body' => \json_encode($parameters, true)
            ]);
        } catch (GuzzleException $e) {
            $this->logManager->error($e->getMessage(), ['line' => $e->getLine(), 'file' => $e->getFile()]);
        }
        return \json_decode($response->getBody()->getContents(), true);
    }
}
