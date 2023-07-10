<?php

namespace Marktic\Billing\InvoiceLines\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class InvoiceLines
 * @package Marktic\Billing\InvoiceLines\Models
 */
class InvoiceLines extends RecordManager
{
    use InvoiceLinesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_invoice_lines';
    public const CONTROLLER = 'mkt_billing_invoice_lines';
}
