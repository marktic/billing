<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Billing\BillingStatuses\Models\BillingStatus;

trait HasSubjectTrait
{
    use HasSubject;

    protected ?BillingStatus $billingStatus = null;

    public function setSubject($subject): void
    {
        $this->subject = $subject;

        /** @var BillingStatus $billingStatus */
        $billingStatus = $subject->getBillingStatus();
        $this->billingStatus = $billingStatus;
        $this->setCustomerPartyId($billingStatus->getCustomerPartyId());
    }

    public static function forSubject($subject): static
    {
        $generator = new static();
        $generator->setSubject($subject);
        return $generator;
    }
}