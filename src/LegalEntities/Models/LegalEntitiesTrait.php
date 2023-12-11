<?php

namespace Marktic\Billing\LegalEntities\Models;

use Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner\HasOwnerRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait LegalEntitiesTrait
{
    use HasOwnerRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function bootLegalEntitiesTrait()
    {
//        static::updating(function ($event) {
//            /** @var Event $event */
//            UpdatePromotionCodes::for($event->getRecord());
//        });
    }

    protected function initRelationsBilling(): void
    {
        $this->initRelationsBillingOwner();
    }

    public function generatePrimaryFK()
    {
        return 'legal_entity_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::LEGAL_ENTITIES, LegalEntities::TABLE);
    }
}
