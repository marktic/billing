<?php

namespace Marktic\Billing\BillingStatuses\Actions\Changes;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\BillingStatuses\Statuses\Billable;
use Marktic\Billing\BillingStatuses\Statuses\Billed;
use Marktic\Billing\BillingStatuses\Statuses\Pending;
use Marktic\Billing\Invoices\Models\Invoice;

/**
 * @property BillingStatus $subject
 */
class UpdateOnInvoiceCreated extends Action
{
    use HasSubject;

    protected ?Invoice $invoice = null;

    public static function forInvoice($subject, $invoice): static
    {
        $action = new static();
        $action->setSubject($subject);
        $action->setInvoice($invoice);
        return $action;
    }

    public function setInvoice($invoice): void
    {
        $this->invoice = $invoice;
    }

    public function handle(): void
    {
        $this->subject->setBillingInvoice($this->invoice);
        $this->subject->setCurrency($this->invoice->getCurrency());
        
        if ($this->subject->getAmount() < 1) {
            $this->subject->setAmount($this->invoice->getAmount());
        }

        $this->subject->setAmountBilled($this->invoice->getAmount());

        if ($this->subject->isInStatus([Billable::NAME, Pending::NAME])) {
            $this->subject->setStatus(Billed::NAME);
        }

        $this->subject->saveRecord();
    }
}