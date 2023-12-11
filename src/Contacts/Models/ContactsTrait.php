<?php

namespace Marktic\Billing\Contacts\Models;

use Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner\HasOwnerRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait ContactsTrait
{
    use HasOwnerRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function bootContactsTrait()
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
        return 'contact_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::CONTACTS, Contacts::TABLE);
    }
}
