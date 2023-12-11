<?php

namespace Marktic\Billing\ExternalSystems\Communications\Models;

use Marktic\Billing\Base\Models\Behaviours\HasSubject\HasSubjectRepositoryTrait;
use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Marktic\Billing\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Billing\Utility\BillingModels;
use Marktic\Billing\Utility\PackageConfig;

trait CommunicationsTrait
{
    use HasSubjectRepositoryTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function initRelationsBilling(): void
    {
        $this->initRelationsBillingSubject();
    }


    protected function generateTable(): string
    {
        return PackageConfig::tableName(BillingModels::INVOICES, Communications::TABLE);
    }

}
