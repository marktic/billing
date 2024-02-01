<?php

namespace Marktic\Billing\InvoiceLines\Actions\Calculator;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Base\Actions\Behaviours\CanDoSave;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;

/**
 * @method InvoiceLine getSubject()
 */
class CalculateUnitPrice extends Action
{
    use HasSubject;

    public function handle(): void
    {
        $this->calculateUnitPrice();
    }

    protected function calculateUnitPrice(): void
    {
        $total = $this->getSubject()->getTotal();
        $quantity = $this->getSubject()->getQuantity();

        $unitTotalPrice = $total / $quantity;
        $taxRate = $this->getSubject()->getTaxRate();

        $unitPrice = $unitTotalPrice / (1 + $taxRate / 100);
        $this->getSubject()->setUnitPrice(round($unitPrice));
        $this->getSubject()->setSubtotal(round($unitPrice*$quantity));
        $this->getSubject()->setTaxTotal(round($unitPrice*$quantity*$taxRate/100));
        $this->getSubject()->setTotal(round($unitPrice*$quantity*(1+$taxRate/100)));
    }
}

