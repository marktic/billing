<?php

namespace Marktic\Billing\BillingStatuses\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class BillingStatus
 * @package Marktic\Billing\BillingStatuses\Models
 */
class BillingStatus extends Record
{
    use BillingStatusTrait;
    use CommonRecordTrait;

    public function getRegistry()
    {
        // TODO: Implement getRegistry() method.
    }
}
