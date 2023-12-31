<?php

namespace Marktic\Billing\InvoiceLines\Actions\Calculator;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\Base\Actions\Behaviours\CanDoSave;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;

/**
 * @method InvoiceLine getSubject()
 */
class CalculateLineTotals extends Action
{
    use HasSubject;
    use CanDoSave;

    public function handle(): void
    {
        $this->calculateLineTotals();
        $this->triggerSave();
    }

    protected function calculateLineTotals(): void
    {
        $this->calculateLineSubTotal();
        $this->calculateLineTaxTotal();
        $this->calculateLineTotalWithTax();
    }

    protected function calculateLineSubTotal(): void
    {
        $line = $this->getSubject();
        $line->setSubtotal($line->getUnitPrice() * $line->getQuantity());
    }

    protected function calculateLineTaxTotal(): void
    {
        $line = $this->getSubject();
        $line->setTaxTotal($line->getSubtotal() * $line->getTaxRate() / 100);
    }

    protected function calculateLineTotalWithTax(): void
    {
        $line = $this->getSubject();
        $line->setTotal($line->getSubtotal() + $line->getTaxTotal());
    }
}

