<?php

namespace Marktic\Billing\Tests\InvoiceLines\Actions\Invoicetic;

use Invoicetic\Common\Dto\Base\UnitCode;
use Marktic\Billing\InvoiceLines\Actions\Invoicetic\InvoiceLineGenerate;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use PHPUnit\Framework\TestCase;

class InvoiceLineGenerateTest extends TestCase
{
    public function test_generate_unit_name()
    {
        $invoiceLine = new InvoiceLine();
        $invoiceLine->setUnitName('test');

        $invoicetic = InvoiceLineGenerate::for($invoiceLine)->handle();
        self::assertSame(UnitCode::UNIT, $invoicetic->getUnitCode());
    }
}
