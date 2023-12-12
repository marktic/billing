<?php

namespace Marktic\Billing\Invoices\Models;

interface InvoicesRepository
{
    public const TABLE = 'mkt_billing_invoices';
    public const CONTROLLER = 'mkt_billing-invoices';

    public const RELATION_CUSTOMER_PARTY = 'CustomerParty';
}