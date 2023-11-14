<?php

declare(strict_types=1);

namespace App\Controllers;

use App\CryptoApi;
use App\Response;

class CryptoController
{
    private CryptoApi $api;

    public function __construct()
    {
        $this->api = new CryptoApi();
    }

    public function index(): Response
    {
        $searchArray = ['ETH', 'XRP', 'SOL'];
        $cryptoResults = $this->api->getCryptoCurrencyData($searchArray);

        return new Response(
            'crypto/index',
            [
                'message' => 'Welcome to ',
                'cryptoCollection' => $cryptoResults,
            ]
        );
    }
    public function search(): Response
    {
        $input = $_GET['Symbol'] ?? '';
        $searchArray = explode(' ', $input);

        $cryptoResults = $this->api->getCryptoCurrencyData($searchArray);

        return new Response(
            'crypto/search',
            [
                'message' => 'Search results',
                'cryptoCollection' => $cryptoResults,
            ]
        );
    }

}