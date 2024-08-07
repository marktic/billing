<?php

namespace Marktic\Billing\Tests\InvoiceLines\Actions\Calculator;

use Marktic\Billing\InvoiceLines\Actions\Calculator\CalculateUnitPrice;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use PHPUnit\Framework\TestCase;

class CalculateUnitPriceTest extends TestCase
{
    /**
     * @param $data
     * @param $expected
     * @return void
     * @dataProvider data_calculate
     */
    public function test_calculate($data, $expected)
    {
        $line = new InvoiceLine();
        $line->fill($data);

        CalculateUnitPrice::for($line)->handle();
        self::assertSame($expected['unit_price'], $line->getUnitPrice());
        self::assertSame($expected['subtotal'], $line->getSubtotal());
        self::assertSame($expected['tax_total'], $line->getTaxTotal());
        self::assertSame($expected['total'], $line->getTotal());
    }

    public function data_calculate()
    {
        return [
            [
                ['total' => 10000, 'tax_rate' => 19, 'quantity' => 1],
                ['unit_price' => 8403, 'subtotal' => 8403, 'tax_total' => 1597, 'total' => 10000],
            ],
            [
                ['total' => 10000, 'tax_rate' => 9, 'quantity' => 1],
                ['unit_price' => 9174, 'subtotal' => 9174, 'tax_total' => 826, 'total' => 10000],
            ],
            [
                ['total' => 15000, 'tax_rate' => 9, 'quantity' => 1],
                ['unit_price' => 13761, 'subtotal' => 13761, 'tax_total' => 1239, 'total' => 15000],
            ],
            [
                ['total' => 4500, 'tax_rate' => 19, 'quantity' => 1],
                ['unit_price' => 3782, 'subtotal' => 3782, 'tax_total' => 718, 'total' => 4500],
            ],
            [
                ['total' => 12972, 'tax_rate' => 19, 'quantity' => 1],
                ['unit_price' => 10901, 'subtotal' => 10901, 'tax_total' => 2071, 'total' => 12972],
            ]
        ];
    }
}
