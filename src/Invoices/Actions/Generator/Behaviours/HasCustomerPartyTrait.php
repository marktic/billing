<?php

namespace Marktic\Billing\Invoices\Actions\Generator\Behaviours;

use Nip\Utility\Oop;

trait HasCustomerPartyTrait
{
    protected ?int $customerPartyId;

    public function getCustomerPartyId(): ?int
    {
        if (false === Oop::propertyIsInitialized($this, 'customerPartyId')) {
            $this->initCustomerPartyId();
        }
        return $this->customerPartyId;
    }

    public function setCustomerPartyId(?int $customerPartyId): void
    {
        $this->customerPartyId = $customerPartyId;
    }

    public function hasCustomerPartyId(): bool
    {
        return $this->getCustomerPartyId() !== null;
    }

    protected function populateCustomerParty(): void
    {
        if ($this->hasCustomerPartyId() === false) {
            return;
        }
        $this->getInvoice()->setCustomerPartyId($this->getCustomerPartyId());
    }

    protected function initCustomerPartyId(): void
    {
        $this->setCustomerPartyId($this->generateCustomerPartyId());
    }

    protected function generateCustomerPartyId()
    {
        return null;
    }
}