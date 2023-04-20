<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use App\Models\Currency;

class ApiClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getURL(): array
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $apiKey = '15e15a5c-7117-43f7-afa1-b8eaff3783cc';

        $response = $this->client->request('GET', $url, [
            'headers' => [
                'X-CMC_PRO_API_KEY' => $apiKey,
                'Accept' => 'application/json',
            ],
        ]);

        $decodedResponse = json_decode($response->getBody()->getContents(), true);

        $lastTenCurrencies = Currency::getLastTen($decodedResponse);

        return $lastTenCurrencies;
    }
}
