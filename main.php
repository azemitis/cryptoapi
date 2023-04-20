<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

$apiClient = new \App\ApiClient();

$tenCurrencies = $apiClient->getURL();

foreach ($tenCurrencies as $currency) {
    echo "Name: " . $currency['name'] . PHP_EOL;
    echo "Symbol: " . $currency['symbol'] . PHP_EOL;
    echo "Price: " . $currency['quote']['USD']['price'] . PHP_EOL;
    echo "--------------------------" . PHP_EOL;
}