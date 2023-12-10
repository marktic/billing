<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasSubject;

trait HasSubjectRepositoryTrait
{
    protected function initRelationsBillingSubject(): void
    {
        $this->morphTo(
            'BillingSubject',
            ['morphPrefix' => 'subject', 'morphTypeField' => 'subject']
        );
    }
}
