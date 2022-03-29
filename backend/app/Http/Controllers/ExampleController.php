<?php

namespace App\Http\Controllers;

use App\Services\CryptoCurrencyNewsParsing;

class ExampleController extends Controller
{
    protected CryptoCurrencyNewsParsing $cryptoCurrencyNewsParsing;

    public function __construct(CryptoCurrencyNewsParsing $cryptoCurrencyNewsParsing)
    {
        $this->cryptoCurrencyNewsParsing = $cryptoCurrencyNewsParsing;
    }

    public function test()
    {
        // Test
        $this->cryptoCurrencyNewsParsing->parsing();
    }
}
