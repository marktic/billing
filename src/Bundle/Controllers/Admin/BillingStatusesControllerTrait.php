<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Nip\Records\AbstractModels\Record;

trait BillingStatusesControllerTrait
{
    use \ByTIC\Controllers\Behaviors\HasStatus;

    /**
     * @param BillingStatus $item
     * @return bool
     */
    protected function checkItemAccess($item)
    {
        if (parent::checkItemAccess($item) === false) {
            return false;
        }

        if (false === ($item->getBillingSubject() instanceof Record)) {
            return true;
        }
        return true;
    }

}