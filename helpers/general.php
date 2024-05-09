<?php

use Illuminate\Support\Facades\Auth;

function user()
{
    return Auth::user();
}

function currency($amt, $withCurrencyPrefix = true)
{
    $currencyAmt = number_format($amt, 2, ',', '.');

    if (! $withCurrencyPrefix) {
        return $currencyAmt;
    }

    return "R$ {$currencyAmt}";
}
