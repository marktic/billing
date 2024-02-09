<?php

namespace Marktic\Billing\Invoices\Models;

use ByTIC\Models\SmartProperties\RecordsTraits\HasStatus\RecordsTrait as HasStatusRecordsTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\BillingOwner\ModelsRelated\HasOwner\HasOwnerRepositoryTrait;
use Marktic\Billing\BillingSubject\ModelsRelated\HasSubject\HasSubjectRepositoryTrait;
use Marktic\Billing\Parties\ModelsRelated\HasCustomerParty\HasCustomerPartyRepositoryTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait InvoicesTrait
{
    use HasOwnerRepositoryTrait;
    use HasSubjectRepositoryTrait;
    use HasCustomerPartyRepositoryTrait;
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
        $this->initRelationsBillingCustomerParty();
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


    public function generatePrimaryFK()
    {
        return 'invoice_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::INVOICES, Invoices::TABLE);
    }

    protected function generateMorphName(): string
    {
        return InvoicesRepository::CONTROLLER;
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
