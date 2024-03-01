<?php

namespace Marktic\Billing\Invoices\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class Invoice
 * @package Marktic\Billing\Invoices\Models
 */
class Invoice extends Record implements InvoiceInterface
{
    use InvoiceTrait;
    use CommonRecordTrait;

    public const METADATA_EXTERNAL_LINK = 'external_link';

    public function getRegistry()
    {
        // TODO: Implement getRegistry() method.
    }


}
