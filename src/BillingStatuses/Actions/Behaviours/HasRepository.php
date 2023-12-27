<?php

namespace Marktic\Billing\BillingStatuses\Actions\Behaviours;

use Marktic\Billing\BillingStatuses\Models\BillingStatuses;
use Marktic\Billing\Utility\BillingModels;
use Nip\Records\RecordManager;

trait HasRepository
{
    use \Marktic\Billing\Base\Actions\Behaviours\HasRepository;

    protected function generateRepository(): BillingStatuses|RecordManager
    {
        return BillingModels::billingStatuses();
    }
}