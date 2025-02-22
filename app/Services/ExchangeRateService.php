<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;

class ExchangeRateService
{
    private string $apiUrl = 'https://api.exchangerate-api.com/v4/latest/';

    /**
     * Fetch exchange rates for a given base currency.
     *
     * @param string $currencyCode
     * @return array
     * @throws Exception
     */
    public function getExchangeRates(string $currencyCode): array
    {
        try {
            $response = Http::get($this->apiUrl . strtoupper($currencyCode));

            if ($response->failed()) {
                throw new Exception("Failed to fetch exchange rates.");
            }

            return $response->json();

        } catch (Exception $e) {
            report($e);
            throw new Exception("Error fetching exchange rates: " . $e->getMessage());
        }
    }
}
