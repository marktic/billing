<?php

namespace Marktic\Billing\Tests\Invoices\Models;

use Marktic\Billing\Invoices\Models\Invoices;
use PHPUnit\Framework\TestCase;

class InvoicesTest extends TestCase
{
    public function test_get_statuses()
    {
        $repository = new Invoices();
        $this->assertEquals(
            [
                'issued',
                'overdue',
                'paid',
                'partially_paid',
                'draft',
                'voided'
            ],
            $repository->getStatusProperty('name')
        );
    }

    public function test_naming()
    {
        $repository = new Invoices();
        self::assertSame('mkt_billing_invoices', $repository->getTable());
        self::assertSame('mkt_billing-invoices', $repository->getController());
        self::assertSame('mkt_billing-invoices', $repository->getMorphName());
    }
}
