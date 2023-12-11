<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\Base\Dto\AdminOwner;
use Marktic\Billing\Base\HasOwner\Actions\Queries\PopulateQueryWithOwnerWhere;
use Marktic\Billing\Bundle\Forms\Admin\Parties\CompleteDataForm;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Parties\Actions\BillingPartyCreateForSubject;

/**
 *
 */
trait InvoicesControllerTrait
{
    use AbstractControllerTrait;

    protected function newIndexQuery()
    {
        $query = parent::newIndexQuery();
        return PopulateQueryWithOwnerWhere::for($query, $this->getOwner())->handle();
    }

    /**
     * @param Invoice $item
     * @return bool
     */
    protected function checkItemAccess($item)
    {
        if (parent::checkItemAccess($item) === false) {
            return false;
        }
        if ($item->getBillingOwner() == $this->getOwner()) {
            return true;
        }
        return false;
    }


}