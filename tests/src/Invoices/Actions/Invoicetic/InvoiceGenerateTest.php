<?php

namespace Marktic\Billing\Tests\Invoices\Actions\Invoicetic;

use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Actions\Invoicetic\InvoiceGenerate;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Tests\AbstractTest;

class InvoiceGenerateTest extends AbstractTest
{
    public function test_handle()
    {
        $invoice = $this->generateNewInvoice();

        $eInvoice = InvoiceGenerate::for($invoice)->handle();
        self::assertSame($eInvoice->getId(), 'INV-00001');

        $serialized = $eInvoice->serialize();

        self::assertJson($serialized);
        self::assertJsonStringEqualsJsonFile(
            TEST_FIXTURE_PATH . '/Invoices/BaseDemoInvoice/invoice.json',
            $serialized
        );
    }

    protected function generateNewInvoice()
    {
        return require TEST_FIXTURE_PATH . '/Invoices/BaseDemoInvoice/invoice.php';
    }
}
