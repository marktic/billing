<?php

namespace Marktic\Billing\BillingStatuses\Statuses;

/**
 * Class Billable
 * @package Marktic\Billing\BillingStatuses\Statuses
 */
class Billable extends AbstractStatus
{
    public const NAME = self::BILLABLE;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'info';
    }
}
