<?php

namespace Marktic\Billing\BillingStatuses\Models\Behaviours\HasAmounts;

use ByTIC\Money\Utility\Money;

trait HasAmountsRecordTrait
{

    protected ?int $amount = null;

    protected ?int $amount_billed = null;

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

    public function getAmountBilled(): ?int
    {
        return $this->amount_billed;
    }

    public function getAmountBilledMoney(): ?\ByTIC\Money\Money
    {
        return Money::fromCents($this->getAmountBilled(), $this->getCurrency());
    }

    public function setAmountBilled(?int $amount_paid): void
    {
        $this->amount_billed = $amount_paid;
    }
    public function setAmountBilledMoney(?\ByTIC\Money\Money $amount): void
    {
        $this->setAmountBilled($amount->getAmount());
    }
}
