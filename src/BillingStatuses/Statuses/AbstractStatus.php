<?php

namespace Marktic\Billing\BillingStatuses\Statuses;

use ByTIC\Models\SmartProperties\Properties\Statuses\Generic as GenericStatus;
use Marktic\Billing\BillingStatuses\Models\BillingStatus;

/**
 * Class AbstractStatus
 * @package Marktic\Billing\BillingStatuses\Statuses
 *
 * @method BillingStatus getItem()
 */
abstract class AbstractStatus extends GenericStatus
{
    public const DIRECTORY = __DIR__;

    public const PENDING = 'pending';

    public const NONBILLABLE = 'nonbillable';

    public const TRIAL = 'trial';

    public const DISCOUNT = 'discount';
    public const BILLABLE = 'billable';

    public const BILLED = 'billed';

    public const FAILED = 'failed';

    public const COMPLETED = 'completed';

}
