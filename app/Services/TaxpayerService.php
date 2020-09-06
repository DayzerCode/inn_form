<?php


namespace App\Services;


use App\Contracts\Services\Api\TaxpayerApi;
use App\Contracts\Services\TaxpayerServiceContract;
use Illuminate\Contracts\Cache\Repository as CacheContract;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\InvalidArgumentException;

class TaxpayerService implements TaxpayerServiceContract
{
    private const CACHE_TTL = 86400;
    private TaxpayerApi $api;
    private CacheContract $cacheManager;
    private LoggerInterface $logManager;

    public function __construct(TaxpayerApi $api, CacheContract $cacheManager, LoggerInterface $logManager)
    {
        $this->api = $api;
        $this->cacheManager = $cacheManager;
        $this->logManager = $logManager;
    }

    public function getStatusInn(string $inn): array
    {
        try {
            if ($this->cacheManager->has($inn)) {
                return $this->result($this->cacheManager->get($inn), 'success');
            } else {
                $response = $this->api->getStatusInn($inn);
                $this->cacheManager->set($inn, $response['message'], self::CACHE_TTL);
                return $this->result($response['message'], 'success');
            }
        } catch (InvalidArgumentException $e) {
            $this->logManager->error($e->getMessage(), ['line' => $e->getLine(), 'file' => $e->getFile()]);
        }
        return $this->result('Произошла ошибка получения данных');
    }

    private function result(string $message, string $status = 'error') : array
    {
        return [
            'status' => $status,
            'message' => $message,
        ];
    }
}
