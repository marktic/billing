<?php

namespace Marktic\Billing\BillingStatuses\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class BillingStatuses
 * @package Marktic\Billing\BillingStatuses\Models
 */
class BillingStatuses extends RecordManager
{
    use BillingStatusesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'mkt_billing_billing_statuses';
    public const CONTROLLER = 'mkt_billing-billing_statuses';

}
