<?php

namespace Marktic\Billing\Invoices\Models;

use ByTIC\Models\SmartProperties\RecordsTraits\HasStatus\RecordsTrait as HasStatusRecordsTrait;
use Marktic\Billing\Base\HasOwner\Models\Behaviours\HasOwner\HasOwnerRepositoryTrait;
use Marktic\Billing\Base\HasSubject\Models\Behaviours\HasSubject\HasSubjectRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait InvoicesTrait
{
    use HasOwnerRepositoryTrait;
    use HasSubjectRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;
    use HasStatusRecordsTrait;

    protected function bootInvoicesTrait()
    {
//        static::updating(function ($event) {
//            /** @var Event $event */
//            UpdatePromotionCodes::for($event->getRecord());
//        });
    }

    protected function initRelationsBilling(): void
    {
        $this->initRelationsBillingOwner();
        $this->initRelationsBillingSubject();
        $this->initRelationsCustomerParty();
        $this->initRelationsBillingLines();
    }

    protected function initRelationsBillingLines()
    {
        $this->hasMany(
            'BillingLines',
            [
                'class' => BillingModels::invoiceLinesClass(),
                'fk' => 'invoice_id'
            ]
        );
    }

    protected function initRelationsCustomerParty(): void
    {
        $this->belongsTo(
            InvoicesRepository::RELATION_CUSTOMER_PARTY,
            [
                'class' => BillingModels::parties(),
                'fk' => 'customer_party_id'
            ]
        );
    }

    public function generatePrimaryFK()
    {
        return 'consent_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::INVOICES, Invoices::TABLE);
    }

    /**
     * @return string
     */
    public function getStatusesDirectory(): string
    {
        return dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'InvoiceStatuses';
    }

    /**
     * @return string
     */
    public function getStatusNamespace()
    {
        return '\Marktic\Billing\Invoices\InvoiceStatuses\\';
    }
}
