<?php

namespace Marktic\Billing\Tests\InvoiceLines\Actions\Calculator;

use Marktic\Billing\InvoiceLines\Actions\Calculator\CalculateLineTotals;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use PHPUnit\Framework\TestCase;

class CalculateLineTotalsTest extends TestCase
{
    public function test_calculator()
    {
        $line = new InvoiceLine();
        $line->unit_price = 100;
        $line->quantity = 2;
        $line->tax_rate = 20;

        $action = CalculateLineTotals::for($line);
        $action->handle();

        self::assertSame(200, $line->getSubtotal());
        self::assertSame(40, $line->getTaxTotal());
        self::assertSame(240, $line->getTotal());
    }
}
