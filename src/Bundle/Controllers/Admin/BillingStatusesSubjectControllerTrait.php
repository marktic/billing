<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingStatuses\Actions\BillingStatusCreateForSubject;

trait BillingStatusesSubjectControllerTrait
{
    protected function fillPayloadWithBillingStatus($subject): void
    {
        $billingStatus = BillingStatusCreateForSubject::forSubject($subject)
            ->orCreate()
            ->fetchAndUpdate();
        $this->payload()->with(['billingStatus' => $billingStatus]);
    }
}