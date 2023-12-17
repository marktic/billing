<?php

namespace Marktic\Billing\Invoices\Models\Behaviours\HasAmounts;

use ByTIC\Money\Utility\Money;

trait HasAmountsRecordTrait
{

    protected ?int $amount = null;

    protected ?int $amount_paid = null;

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function addAmount(int $amount): void
    {
        $this->amount += $amount;
    }

    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmountMoney(): ?\ByTIC\Money\Money
    {
        return Money::fromCents($this->getAmount(), $this->getCurrency());
    }

    public function setAmountMoney(?\ByTIC\Money\Money $amount): void
    {
        $this->setAmount($amount->getAmount());
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
