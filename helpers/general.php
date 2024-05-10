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

function formatPhoneNumber($number): string
{
    $number = preg_replace("/[^\d]/", '', $number);

    if (strlen($number) < 10) {
        return $number;
    }

    return preg_replace("/^(55)?(\d{2})(\d{4,5})(\d{4})$/", '($2) $3-$4', $number);
}

function kebab(string $content): string
{
    return \Illuminate\Support\Str::kebab($content);
}

function kebabClassBaseName(string $content): string
{
    return kebab(class_basename($content));
}
