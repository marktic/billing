<?php

namespace Marktic\Billing\InvoiceLines\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class InvoiceLines
 * @package Marktic\Billing\InvoiceLines\Models
 */
class InvoiceLine extends Record
{
    use InvoiceLineTrait;
    use CommonRecordTrait;

    public function getRegistry()
    {
        // TODO: Implement getRegistry() method.
    }

}
