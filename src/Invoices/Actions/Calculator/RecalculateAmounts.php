<?php

namespace Marktic\Billing\Invoices\Actions\Calculator;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Base\Actions\Behaviours\CanDoSave;
use Marktic\Billing\Invoices\Models\Invoice;

/**
 * @method Invoice getSubject()
 */
class RecalculateAmounts extends Action
{
    use HasSubject;
    use CanDoSave;

    public function handle(): void
    {
        $invoice = $this->getSubject();

        $items = $invoice->getBillingLines();
        $amount = 0;
        foreach ($items as $item) {
            $amount += $item->getTotal();
        }

        $invoice->setAmount($amount);

        $this->triggerSave();
    }
}

