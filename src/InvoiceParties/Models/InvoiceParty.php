<?php

namespace Marktic\Billing\InvoiceParties\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Marktic\Billing\InvoiceParties\Dto\InvoicePartyInterface;
use Nip\Records\Record;

/**
 * Class InvoiceParty
 * @package Marktic\Billing\InvoiceParties\Models
 */
class InvoiceParty extends Record implements InvoicePartyInterface
{
    use InvoicePartyTrait;
    use CommonRecordTrait;

}
