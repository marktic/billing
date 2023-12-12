<?php

use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Invoices\Models\Invoices;

$invoice = new Invoice();
$invoice->setSeries('INV');
$invoice->setNumber(1);

$collection = new \Nip\Collections\Collection();

$invoiceLine = new InvoiceLine();
$invoiceLine->setName('Test');
$invoiceLine->setQuantity(1);
$invoiceLine->setUnitPrice(100);
$collection->add($invoiceLine);

$invoiceLine = new InvoiceLine();
$invoiceLine->setName('Test');
$invoiceLine->setQuantity(1);
$invoiceLine->setUnitPrice(100);
$collection->add($invoiceLine);

$invoice = Mockery::mock($invoice)->makePartial();
$invoice->shouldReceive('getBillingLines')->andReturn($collection);

return $invoice;