<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasOwner;

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
