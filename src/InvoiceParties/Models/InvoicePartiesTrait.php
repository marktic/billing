<?php

namespace Marktic\Billing\InvoiceParties\Models;

use Marktic\Billing\Base\Models\Behaviours\HasOwner\HasOwnerRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait InvoicePartiesTrait
{
    use HasOwnerRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function bootBillingConsentsTrait()
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
        return PackageConfig::tableName(BillingModels::CONSENTS, InvoiceParties::TABLE);
    }
}
