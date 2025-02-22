<?php

namespace App\Http\Controllers;

use App\Services\ExchangeRateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    protected ExchangeRateService $exchangeRateService;

    public function __construct(ExchangeRateService $exchangeRateService)
    {
        $this->exchangeRateService = $exchangeRateService;
    }

    /**
     * Get exchange rates for a given currency
     *
     * @param null|string $currencyCode
     * @return JsonResponse
     */
    public function getRates(string|null $currencyCode = null): JsonResponse
    {
        try {

            //Default Kuwait Dinar
            $currencyCode = $currencyCode ?? 'KWD';

            $rates = $this->exchangeRateService->getExchangeRates($currencyCode);

            return response()->json($rates);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
