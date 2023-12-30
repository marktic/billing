<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingOwner\Actions\Queries\PopulateQueryWithOwnerWhere;
use Marktic\Billing\BillingOwner\Controllers\Admin\Behaviours\HasBillingOwnerTrait;
use Marktic\Billing\Bundle\Forms\Admin\Invoices\DetailsForm;
use Marktic\Billing\Invoices\Actions\Changes\DeleteInvoice;
use Marktic\Billing\Invoices\Models\Invoice;

/**
 *
 */
trait InvoicesControllerTrait
{
    use AbstractControllerTrait;
    use Behaviours\HasFormsTrait;
    use HasBillingOwnerTrait;

    public function postView()
    {
        parent::postView();

        /** @var Invoice $item */
        $item = $this->getModelFromRequest();
        $this->payload()->with([
            'items' => $item->getBillingLines(),
            'customerParty' => $item->getCustomerParty(),
        ]);
        $this->initViewStatuses();
    }

    protected function newIndexQuery()
    {
        $query = parent::newIndexQuery();
        return PopulateQueryWithOwnerWhere::for($query, $this->getBillingOwner())->handle();
    }

    public function delete()
    {
        /** @var Invoice $item */
        $item = $this->getModelFromRequest();
        if ($item->getStatusObject()->canDelete() === false) {
            $this->flashRedirect($this->getModelManager()->getMessage('delete.error'), $item->compileURL('view'), 'error');
        }

        DeleteInvoice::for($item)->handle();
        return parent::delete();
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
        if ($item->getBillingOwner() == $this->getBillingOwner()) {
            return true;
        }
        return false;
    }

    protected function getModelFormClass($model, $action = null): ?string
    {
        return match ($action) {
            default => DetailsForm::class,
        };
    }

}