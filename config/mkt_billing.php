<?php

use Marktic\Billing\InvoiceLines\Models\InvoiceLines;
use Marktic\Billing\LegalEntities\Models\LegalEntities;
use Marktic\Billing\Parties\Models\Parties;
use Marktic\Billing\Invoices\Models\Invoices;
use Marktic\Billing\Utility\BillingModels;

return [
    'models' => array(
        BillingModels::INVOICES => Invoices::class,
        BillingModels::INVOICE_LINES => InvoiceLines::class,
        BillingModels::PARTIES => Parties::class,
        BillingModels::LEGAL_ENTITIES => LegalEntities::class,
    ),
    'tables' => [
        BillingModels::INVOICES => Invoices::TABLE,
        BillingModels::INVOICE_LINES => InvoiceLines::TABLE,
        BillingModels::PARTIES => Parties::TABLE,
        BillingModels::LEGAL_ENTITIES => LegalEntities::TABLE,
    ],
    'database' => [
        'connection' => 'main',
        'migrations' => true,
    ],
];
