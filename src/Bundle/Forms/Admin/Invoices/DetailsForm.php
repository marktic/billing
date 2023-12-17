<?php

namespace Marktic\Billing\Bundle\Forms\Admin\Invoices;

use Marktic\Billing\Bundle\Library\Form\FormModel;
use Marktic\Billing\Utility\BillingModels;

/**
 */
class DetailsForm extends FormModel
{
    protected $invoicesRepository;

    public function initialize(): void
    {
        parent::initialize();

        $this->invoicesRepository = BillingModels::invoices();
        $this->addInput('series', $this->invoicesRepository->getLabel('series'), true);
        $this->addInput('number', $this->invoicesRepository->getLabel('number'), true);
        $this->addMoney('amount_money', translator()->trans('amount'), false);

        $this->addDateinput('issued_at', $this->invoicesRepository->getLabel('issued'), true);

        $this->addButton('save', translator()->trans('submit'));
    }
}
