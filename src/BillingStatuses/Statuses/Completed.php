<?php

namespace Marktic\Billing\BillingStatuses\Statuses;

/**
 * Class Billed
 * @package Marktic\Billing\BillingStatuses\Statuses
 */
class Completed extends AbstractStatus
{
    public const NAME = self::COMPLETED;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritDoc
     */
    public function getColorClass()
    {
        return 'success';
    }
}
