<?php

namespace Marktic\Billing\InvoiceLines\Models;

use Marktic\Billing\Base\Models\Behaviours\HasSubject\HasSubjectRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Invoices\ModelsRelated\HasInvoice\HasInvoiceRepositoryTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait InvoiceLinesTrait
{
    use HasInvoiceRepositoryTrait;
    use HasSubjectRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function bootInvoiceLinesTrait()
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
        return 'invoice_line_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::INVOICE_LINES, InvoiceLines::TABLE);
    }
}
