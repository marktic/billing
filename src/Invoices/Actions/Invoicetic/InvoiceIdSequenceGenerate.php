<?php

namespace Marktic\Billing\Invoices\Actions\Invoicetic;

use Bytic\Actions\Action;
use Invoicetic\Common\InvoiceId\Dto\InvoiceIdSequence;
use Marktic\Billing\Invoices\Models\Invoice;
use Marktic\Billing\Invoices\Models\InvoiceInterface;

class InvoiceIdSequenceGenerate extends Action
{
    protected InvoiceInterface $invoice;

    protected ?InvoiceIdSequence $idSequence = null;

    public const SEQUENCE_SEPARATOR = '-';

    public const SEQUENCE_PATTERN = '{SEQUENCE}{SEPARATOR}{NUMBER}';

    public static function for(InvoiceInterface $invoice): self
    {
        $action = new static();
        $action->invoice = $invoice;
        return $action;
    }

    public function getInvoiceId(): ?string
    {
        return $this->getInvoiceIdSequence()->getId();
    }

    public function getInvoiceIdSequence(): ?InvoiceIdSequence
    {
        if (!isset($this->idSequence)) {
            $this->idSequence = $this->generateIdSequence();
        }

        return $this->idSequence;
    }

    protected function generateIdSequence()
    {
        $sequence = new InvoiceIdSequence();
        $sequence->setPattern(InvoiceIdSequence::TAG_SEQUENCE . InvoiceIdSequence::TAG_SEPARATOR . InvoiceIdSequence::TAG_NUMBER);
        $sequence->setSequence($this->invoice->getSeries());
        $sequence->setNumber($this->invoice->getNumber());
        return $sequence;
    }
}