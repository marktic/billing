<?php

namespace Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner;

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
