<?php

use Marktic\Billing\InvoiceLines\Models\InvoiceLines;
use Marktic\Billing\InvoiceParties\Models\InvoiceParties;
use Marktic\Billing\Invoices\Models\Invoices;
use Marktic\Billing\Utility\BillingModels;

return [
    'models' => array(
        BillingModels::INVOICES => Invoices::class,
        BillingModels::INVOICE_LINES => InvoiceLines::class,
        BillingModels::INVOICE_PARTIES => InvoiceParties::class,
    ),
    'tables' => [
        BillingModels::INVOICES => Invoices::TABLE,
        BillingModels::INVOICE_LINES => InvoiceLines::TABLE,
        BillingModels::INVOICE_PARTIES => InvoiceParties::TABLE,
    ],
    'database' => [
        'connection' => 'main',
        'migrations' => true,
    ],
];
