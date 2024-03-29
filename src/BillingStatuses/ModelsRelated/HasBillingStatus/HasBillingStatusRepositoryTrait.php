<?php

namespace Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus;

use Marktic\Billing\Utility\BillingModels;

trait HasBillingStatusRepositoryTrait
{

    protected function initRelationBillingStatus(): void
    {
        $this->morphOne(
            self::RELATION_BILLING_STATUS,
            [
                'class' => BillingModels::billingStatusesClass(),
                'morphPrefix' => 'subject',
                'morphTypeField' => 'subject',
            ]
        );
    }
}
