<?php

use Marktic\Billing\BillingStatuses\Statuses\AbstractStatus;
use Marktic\Billing\Contacts\Models\Contacts;
use Marktic\Billing\ExternalSystems\Communications\Models\Communications;
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
        BillingModels::CONTACTS => Contacts::class,
        BillingModels::EXTERNAL_COMMUNICATIONS => Communications::class,
    ),
    'tables' => [
        BillingModels::INVOICES => Invoices::TABLE,
        BillingModels::INVOICE_LINES => InvoiceLines::TABLE,
        BillingModels::PARTIES => Parties::TABLE,
        BillingModels::LEGAL_ENTITIES => LegalEntities::TABLE,
        BillingModels::CONTACTS => Contacts::TABLE,
        BillingModels::EXTERNAL_COMMUNICATIONS => Communications::TABLE,
    ],
    'billingStatuses' => [
        'statuses' => [
            'directories' => [AbstractStatus::DIRECTORY],
        ],
    ],
    'database' => [
        'connection' => 'default',
        'migrations' => true,
    ],
];
