<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Nip\Utility\Oop;

trait HasBillingOwnerTrait
{
    protected mixed $billingOwner;

    public function getBillingOwner()
    {
        if (false === Oop::propertyIsInitialized($this, 'billingOwner')) {
            $this->initBillingOwner();
        }
        return $this->billingOwner;
    }

    public function setBillingOwner($billingOwner): void
    {
        $this->billingOwner = $billingOwner;
    }

    public function hasBillingOwner(): bool
    {
        return $this->getBillingOwner() !== null;
    }

    protected function populateBillingOwner(): void
    {
        if ($this->hasBillingOwner() === false) {
            return;
        }
        $this->getInvoice()->setBillingOwner($this->getBillingOwner());
    }

    protected function initBillingOwner(): void
    {
        $this->setBillingOwner($this->generateBillingOwner());
    }

    protected function generateBillingOwner()
    {
        return null;
    }


}