<?php

namespace Marktic\Billing\Invoices\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class Invoices
 * @package Marktic\Billing\Invoices\Models
 */
class Invoices extends RecordManager
{
    use InvoicesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_invoices';
    public const CONTROLLER = 'mkt_billing-invoices';
}
