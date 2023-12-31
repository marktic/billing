<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingOwner\Controllers\Admin\Behaviours\HasBillingOwnerTrait;
use Marktic\Billing\Bundle\Forms\Admin\InvoiceLines\DetailsForm;
use Marktic\Billing\InvoiceLines\Actions\Changes\DeleteInvoiceLine;
use Marktic\Billing\InvoiceLines\Actions\Queries\PopulateQueryWithInvoiceOwnerWhere;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;
use Marktic\Billing\Invoices\Models\Invoice;

/**
 * @method InvoiceLine getModelFromRequest()
 */
trait InvoiceLinesControllerTrait
{
    use AbstractControllerTrait;
    use Behaviours\HasFormsTrait;
    use HasBillingOwnerTrait;


    protected function afterActionUrlDefault($type, $item = null)
    {
        if ($item) {
            return $item->getBillingInvoice()->compileURL('view');
        }
        return parent::afterActionUrlDefault($type, $item);
    }

    protected function newIndexQuery()
    {
        $query = parent::newIndexQuery();
        return PopulateQueryWithInvoiceOwnerWhere::forOwner($query, $this->getBillingOwner())->handle();
    }



    public function delete()
    {
        /** @var InvoiceLine $item */
        $item = $this->getModelFromRequest();
        if ($item->getBillingInvoice()->getStatusObject()->canDelete() === false) {
            $this->flashRedirect($this->getModelManager()->getMessage('delete.error'), $item->compileURL('view'), 'error');
        }

        DeleteInvoiceLine::for($item)->handle();
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
        return $this->checkBillingOwnerAccess($item->getBillingInvoice()->getBillingOwner());
    }

    protected function getModelFormClass($model, $action = null): ?string
    {
        return match ($action) {
            default => DetailsForm::class,
        };
    }

}