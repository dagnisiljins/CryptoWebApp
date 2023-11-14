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
                'cryptoCollection' => $cryptoResults,
            ]
        );
    }
    public function search(): Response
    {
        $input = $_GET['Symbol'] ?? '';
        $searchArray = explode(' ', $input);

        $imageMappings = [
            'BTC' => '/images/bitcoin_BTC.png',
            'BNB' => '/images/bnb_BNB.png',
            'DOGE' => '/images/dogecoin_DOGE.png',
            'ETH' => '/images/ethereum_ETH.png',
            'SOL' => '/images/solana_SOL.png',
            'TRX' => '/images/tron_TRX.png',
        ];

        $imageToDisplay = $imageMappings[$input];

        $cryptoResults = $this->api->getCryptoCurrencyData($searchArray);

        return new Response(
            'crypto/search',
            [
                'image' => $imageToDisplay,
                'cryptoCollection' => $cryptoResults,
            ]
        );
    }

}