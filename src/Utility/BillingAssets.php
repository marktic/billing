<?php

namespace Marktic\Billing\Utility;

class BillingAssets
{
    public static function scriptInline(string $path): string
    {
        $path = BillingPaths::scripts($path);

        return '<script type="text/javascript">' . file_get_contents($path) . '</script>';
    }
}