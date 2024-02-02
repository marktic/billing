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

    protected int $initialTotal;

    public function handle(): void
    {
        $this->calculateUnitPrice();
        $this->checkTotals();
    }

    protected function calculateUnitPrice(): void
    {
        $this->initialTotal = $this->getSubject()->getTotal();
        $quantity = $this->getSubject()->getQuantity();

        $unitTotalPrice = $this->initialTotal / $quantity;
        $taxRate = $this->getSubject()->getTaxRate();

        $unitPrice = $unitTotalPrice / (1 + $taxRate / 100);
        $this->getSubject()->setUnitPrice(round($unitPrice));
        $this->getSubject()->setSubtotal(round($unitPrice * $quantity));
        $this->getSubject()->setTaxTotal(round($unitPrice * $quantity * $taxRate / 100));
        $this->getSubject()->setTotal(round($unitPrice * $quantity * (1 + $taxRate / 100)));
    }

    protected function checkTotals(): void
    {
        if ($this->initialTotal === $this->getSubject()->getTotal()) {
            return;
        }
        if ($this->initialTotal > $this->getSubject()->getTotal()) {
            $this->fixLowTotal();
        }
        $this->fixHighTotal();
    }

    protected function fixLowTotal()
    {
        $difference = $this->initialTotal - $this->getSubject()->getTotal();
        if ($difference > 1) {
            throw new \Exception(
                'Difference is too high for low total [ ' . $difference . ' ][ ' . $this->initialTotal . ' ][ ' . $this->getSubject()->getTotal() . ' ]
                ');
        }
        $this->getSubject()->setTotal($this->initialTotal);
        $this->getSubject()->setTaxTotal($this->subject->getTaxTotal() + $difference);
    }

    protected function fixHighTotal()
    {
        $difference = $this->getSubject()->getTotal() - $this->initialTotal;
        if ($difference > 1) {
            throw new \Exception(
                'Difference is too high for high total [ ' . $difference . ' ][ ' . $this->initialTotal . ' ][ ' . $this->getSubject()->getTotal() . ' ]
                ');
        }
        $this->getSubject()->setTotal($this->initialTotal);
        $this->getSubject()->setTaxTotal($this->subject->getTaxTotal() - $difference);
    }
}

