<?php

namespace Marktic\Billing\BillingStatuses\Models\Behaviours\HasStatus;

use Marktic\Billing\BillingStatuses\Statuses\Pending;
use Marktic\Billing\Utility\PackageConfig;

use ByTIC\Models\SmartProperties\RecordsTraits\HasStatus\RecordsTrait;
trait HasStatusRepositoryTrait
{
    use RecordsTrait;

    /**
     * @return string
     */
    public function getStatusItemsRootNamespace()
    {
        return 'Marktic\Billing\BillingStatuses\Statuses\\';
    }

    /**
     * @return array
     */
    public function getStatusItemsDirectory(): array
    {
        return PackageConfig::billingStatusesDirectories();
    }

    public function getDefaultStatus(): string
    {
        return Pending::NAME;
    }

}