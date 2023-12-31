<?php

namespace Marktic\Billing\Bundle\Forms\Admin\InvoiceLines;

use Marktic\Billing\Bundle\Library\Form\FormModel;
use Marktic\Billing\InvoiceLines\Actions\Changes\EditInvoiceLine;

/**
 * Class Admin_Forms_Invoices_Item_Details
 */
class DetailsForm extends FormModel
{
    public function initialize(): void
    {
        parent::initialize();

        $this->addInput('name', translator()->trans('name'), true);
        $this->addInput('unit_name', 'unit_name', true);

        $this->addMoney('unit_price_money', translator()->trans('cost'), false);
        $this->addInput('quantity', translator()->trans('quantity'), false);
        $this->addMoney('subtotal_money', translator()->trans('value'), false);

        $this->addButton('save', translator()->trans('submit'));
    }

    public function process(): void
    {
        parent::process();

        EditInvoiceLine::for($this->getModel())
            ->handle();
    }
}
