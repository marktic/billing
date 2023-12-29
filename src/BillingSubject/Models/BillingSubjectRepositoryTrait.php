<?php

namespace Marktic\Billing\BillingSubject\Models;

use Marktic\Billing\BillingStatuses\ModelsRelated\HasBillingStatus\HasBillingStatusRepositoryTrait;

trait BillingSubjectRepositoryTrait
{
    use HasBillingStatusRepositoryTrait;

    protected function initRelationsBilling(): void
    {
        $this->initRelationBillingStatus();
    }
}