<?php

return [
    ['GET', '/', ['App\Controllers\CryptoController', 'index']],
    ['GET', '/search', ['App\Controllers\CryptoController', 'search']]
];