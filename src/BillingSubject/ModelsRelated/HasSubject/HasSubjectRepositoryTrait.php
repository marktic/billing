<?php

namespace Marktic\Billing\BillingSubject\ModelsRelated\HasSubject;

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
