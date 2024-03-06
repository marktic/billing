<?php

namespace Marktic\Billing\Invoices\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class Invoices
 * @package Marktic\Billing\Invoices\Models
 */
class Invoices extends RecordManager implements InvoicesRepository
{
    use InvoicesTrait, CommonRecordsTrait {
        InvoicesTrait::generateFilterManagerClass insteadof CommonRecordsTrait;
    }

}
