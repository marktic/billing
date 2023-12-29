<?php

namespace Marktic\Billing\BillingStatuses\Models;

use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRepositoryTrait;
use Marktic\Billing\Parties\ModelsRelated\HasCustomerParty\HasCustomerPartyRepositoryTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait BillingStatusesTrait
{
    use HasSubjectRepositoryTrait;
    use HasCustomerPartyRepositoryTrait;
    use Behaviours\HasStatus\HasStatusRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function bootBillingStatusesTrait()
    {
//        static::updating(function ($event) {
//            /** @var Event $event */
//            UpdatePromotionCodes::for($event->getRecord());
//        });
    }

    protected function initRelationsBilling(): void
    {
        $this->initRelationsBillingSubject();
        $this->initRelationsCustomerParty();
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::BILLING_STATUSES, BillingStatuses::TABLE);
    }
}
