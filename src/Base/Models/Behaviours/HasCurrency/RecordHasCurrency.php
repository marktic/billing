<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasCurrency;

trait RecordHasCurrency
{
    protected ?string $currency = null;

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }
}
