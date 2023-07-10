<?php

namespace Marktic\Billing\InvoiceParties\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class InvoiceParties
 * @package Marktic\Billing\InvoiceParties\Models
 */
class InvoiceParties extends RecordManager
{
    use InvoicePartiesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_invoice_parties';
    public const CONTROLLER = 'mkt_billing_invoice_parties';
}
