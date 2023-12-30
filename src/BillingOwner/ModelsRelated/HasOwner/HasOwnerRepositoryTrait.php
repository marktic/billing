<?php

namespace Marktic\Billing\BillingOwner\ModelsRelated\HasOwner;

trait HasOwnerRepositoryTrait
{
    protected function initRelationsBillingOwner(): void
    {
        $this->morphTo(
            HasOwnerRepositoryInterface::RELATION_OWNER,
            ['morphPrefix' => 'owner', 'morphTypeField' => 'owner']
        );
    }

}
