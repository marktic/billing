<?php

namespace Marktic\Billing\Invoices\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\Dto\Invoice\Invoice as EInvoice;
use Marktic\Billing\Contacts\Models\Contact;
use Marktic\Billing\InvoiceLines\Actions\Invoicetic\InvoiceLineGenerate;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Invoices\Models\InvoiceInterface;
use Marktic\Billing\Parties\Actions\Invoicetic\PartyGenerate;
use Marktic\Billing\Parties\Dto\PartyInterface;
use Marktic\Billing\Parties\Models\Party;

/**
 * @method Contact fetch
 */
class InvoiceGenerate extends Action
{
    protected InvoiceInterface $invoice;

    protected EInvoice $eInvoice;

    public static function for(InvoiceInterface $invoice): self
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
        $party = $this->invoice->getCustomerParty();
        if (!$party instanceof PartyInterface) {
            throw new \Exception('Customer party is required');
        }
        $this->eInvoice->setAccountingCustomerParty(
            PartyGenerate::for($party)->handle()
        );
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
