<?php

namespace Marktic\Billing\Bundle\Forms\Admin\BillingStatuses;

use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\Bundle\Library\Form\FormModel;
use Marktic\Billing\InvoiceLines\Actions\Changes\EditInvoiceLine;
use Marktic\Billing\Utility\BillingModels;

/**
 * Class Admin_Forms_Invoices_Item_Details
 * @method BillingStatus getModel
 */
class DetailsForm extends FormModel
{
    public function initialize(): void
    {
        parent::initialize();

        $this->addMoney('amount_money', translator()->trans('amount_money'), false);
        $this->addMoney('amount_billed_money', translator()->trans('amount_billed_money'), false);
        $this->addInput('currency', translator()->trans('currency'), true);

        $this->addButton('save', translator()->trans('submit'));
    }

    public function getDataFromModel()
    {
        $this->addSelect('status_new', translator()->trans('status'), true);
        $statusElement = $this->getElement('status_new');
        $statuses = BillingModels::billingStatuses()->getStatuses();
        foreach ($statuses as $status) {
            $statusElement->addOption($status->getName(), $status->getLabel());
        }
        parent::getDataFromModel();
    }

    public function saveModel()
    {
        $status_new = $this->getModel()->status_new;
        $status_db = $this->getModel()->getRawOriginal('status');
        if (!empty($status_new) && $status_new != $status_db) {
            $this->getModel()->updateStatus($status_new);
            return;
        }
        parent::saveModel();
    }
}
