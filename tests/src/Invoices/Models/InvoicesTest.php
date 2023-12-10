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
}
