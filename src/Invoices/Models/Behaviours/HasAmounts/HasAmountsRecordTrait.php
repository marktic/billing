<?php

namespace Marktic\Billing\Invoices\Models\Behaviours\HasAmounts;

trait HasAmountsRecordTrait
{
    protected ?string $currency = null;

    protected ?int $amount = null;

    protected ?int $amount_paid = null;

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmountPaid(): ?int
    {
        return $this->amount_paid;
    }

    public function setAmountPaid(?int $amount_paid): void
    {
        $this->amount_paid = $amount_paid;
    }
}
