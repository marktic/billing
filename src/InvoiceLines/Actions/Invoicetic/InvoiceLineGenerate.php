<?php

namespace Marktic\Billing\InvoiceLines\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\InvoiceLine\InvoiceLine as EInvoiceLine;
use Marktic\Billing\InvoiceLines\Models\InvoiceLine;

class InvoiceLineGenerate extends Action
{
    protected InvoiceLine $invoiceLine;

    protected EInvoiceLine $eInvoiceLine;

    public static function for(InvoiceLine $line): self
    {
        $action = new static();
        $action->invoiceLine = $line;
        return $action;
    }

    public function handle(): EInvoiceLine
    {
        $this->eInvoiceLine = $this->newEInvoiceLine();
        $this->populateInvoiceLineAttributes();
        return $this->eInvoiceLine;
    }

    protected function populateInvoiceLineAttributes(): void
    {
        $id = $this->invoiceLine->getId();
        if ($id !== null) {
            $this->eInvoiceLine->setId($id);
        }
        $this->populateItem();
        $this->populatePrice();
        $this->populateInvoicedQuantity();
    }

    protected function populateItem(): void
    {
        $item = $this->eInvoiceLine->getItem();
        $item->setName($this->invoiceLine->getName());
        $item->setDescription($this->invoiceLine->getDescription());
//        $item->setSellersItemIdentification($this->invoiceLine->getSellersItemIdentification());
//        $item->setBuyersItemIdentification($this->invoiceLine->getBuyersItemIdentification());
//        $item->setClassifiedTaxCategory($this->invoiceLine->getClassifiedTaxCategory());
    }

    protected function newEInvoiceLine(): EInvoiceLine
    {
        return new EInvoiceLine();
    }

    protected function populatePrice(): void
    {
        $price = $this->eInvoiceLine->getPrice();
        $price->setPriceAmount($this->invoiceLine->getUnitPrice() / 100);
        $price->setBaseQuantity($this->invoiceLine->getQuantity());
//        $price->setUnitCode();
    }

    protected function populateInvoicedQuantity(): void
    {
        $invoicedQuantity = $this->eInvoiceLine->getInvoicedQuantity();
        $invoicedQuantity->setQuantity($this->invoiceLine->getQuantity());
    }
}