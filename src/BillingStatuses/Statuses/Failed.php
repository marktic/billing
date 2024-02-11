<?php

namespace Marktic\Billing\BillingStatuses\Statuses;

/**
 * Class Pending
 * @package Marktic\Billing\BillingStatuses\Statuses
 */
class Failed extends AbstractStatus
{
    public const NAME = self::FAILED;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'danger';
    }
}
