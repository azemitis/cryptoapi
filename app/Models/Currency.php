<?php declare(strict_types=1);

namespace App\Models;

class Currency
{
    public static function getLastTen(array $response): array
    {
        $currencies = isset($response['data']) ? $response['data'] : [];
        $lastTenCurrencies = array_slice($currencies, -10);
        return $lastTenCurrencies;
    }
}