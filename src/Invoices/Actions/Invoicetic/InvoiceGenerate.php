<?php

namespace Marktic\Billing\Invoices\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\Invoice\Invoice as EInvoice;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\InvoiceLines\Actions\Invoicetic\InvoiceLineGenerate;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Parties\Actions\Invoicetic\PartyGenerate;

/**
 * @method Contact fetch
 */
class InvoiceGenerate extends Action
{
    protected Invoice $invoice;

    protected EInvoice $eInvoice;

    public static function for(Invoice $invoice): self
    {
        $action = new static();
        $action->invoice = $invoice;
        return $action;
    }

    public function handle(): EInvoice
    {
        $this->eInvoice = $this->newEInvoice();
        $this->populateInvoiceAttributes();
        $this->populateCustomerParty();
        $this->populateInvoiceLines();
        return $this->eInvoice;
    }

    protected function newEInvoice(): EInvoice
    {
        return new EInvoice();
    }

    protected function populateInvoiceAttributes(): void
    {
        $this->populateInvoiceId();
        $currency = $this->invoice->getCurrency();
        if ($currency !== null) {
            $this->eInvoice->setDocumentCurrencyCode($currency);
        }
    }

    protected function populateCustomerParty(): void
    {
        $contact = $this->invoice->getCustomerParty();
        if ($contact !== null) {
            $this->eInvoice->setAccountingCustomerParty(
                PartyGenerate::for($contact)->handle()
            );
        }
    }

    protected function populateInvoiceId(): void
    {
        $idSequence = InvoiceIdSequenceGenerate::for($this->invoice);
        $this->eInvoice->setIdSequence($idSequence->getInvoiceIdSequence());
        $this->eInvoice->setId($idSequence->getInvoiceId());
    }

    protected function populateInvoiceLines(): void
    {
        $lines = $this->invoice->getBillingLines();
        $lines->each(function ($line) {
            $this->eInvoice->addInvoiceLine(
                InvoiceLineGenerate::for($line)->handle()
            );
        });
    }
}
