<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingStatuses\Actions\BillingStatusCreateForSubject;
use Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus\HasBillingStatusRepository;
use Marktic\Billing\Utility\BillingModels;

trait BillingStatusesSubjectControllerTrait
{
    protected function fillPayloadWithBillingStatus($subject): void
    {
        $billingStatus = BillingStatusCreateForSubject::forSubject($subject)
            ->orCreate()
            ->fetchAndUpdate();
        $this->payload()->with(['billingStatus' => $billingStatus]);
    }

    protected function fillPayloadWithBillingStatuses(): void
    {
        $billingStatuses = BillingModels::billingStatuses()->getStatuses();
        $this->payload()->with(['billingStatuses' => $billingStatuses]);
    }
}