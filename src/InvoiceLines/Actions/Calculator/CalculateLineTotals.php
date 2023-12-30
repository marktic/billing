<?php

namespace Marktic\Billing\InvoiceLines\Actions\Calculator;

use Bytic\Actions\Action;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;

class CalculateLineTotals extends Action
{
    protected $subject;

    public function __construct(InvoiceLine $line = null)
    {
        $this->subject = $line;
    }

    public function handle(): void
    {
        $this->calculateLineTotals();
    }

    public static function for($line): self
    {
        $action = new static();
        $action->setLine($line);
        return $action;
    }

    public function setLine($line): void
    {
        $this->subject = $line;
    }

    public function getLine(): ?InvoiceLine
    {
        return $this->subject;
    }

    protected function calculateLineTotals(): void
    {
        $this->calculateLineSubTotal();
        $this->calculateLineTaxTotal();
        $this->calculateLineTotalWithTax();
    }

    protected function calculateLineSubTotal(): void
    {
        $line = $this->getLine();
        $line->setSubtotal($line->getUnitPrice() * $line->getQuantity());
    }

    protected function calculateLineTaxTotal(): void
    {
        $line = $this->getLine();
        $line->setTaxTotal($line->getSubtotal() * $line->getTaxRate() / 100);
    }

    protected function calculateLineTotalWithTax(): void
    {
        $line = $this->getLine();
        $line->setTotal($line->getSubtotal() + $line->getTaxTotal());
    }
}

