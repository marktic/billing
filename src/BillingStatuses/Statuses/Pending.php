<?php

namespace Marktic\Billing\BillingStatuses\Statuses;

/**
 * Class Pending
 * @package Marktic\Billing\BillingStatuses\Statuses
 */
class Pending extends AbstractStatus
{
    public const NAME = self::PENDING;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'info';
    }
}
