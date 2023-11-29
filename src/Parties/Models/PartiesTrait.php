<?php

namespace Marktic\Billing\Parties\Models;

use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Contacts\ModelsRelated\HasContact\HasContactRepositoryTrait;
use Marktic\Billing\LegalEntities\ModelsRelated\HasLegalEntity\HasLegalEntityRepositoryTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait PartiesTrait
{
    use HasOwnerRepositoryTrait;
    use HasLegalEntityRepositoryTrait;
    use HasContactRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function bootPartiesTrait()
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
        return 'invoice_party_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::PARTIES, Parties::TABLE);
    }
}
