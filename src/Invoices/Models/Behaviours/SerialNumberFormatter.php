<?php

namespace Marktic\Billing\Invoices\Models\Behaviours;

trait SerialNumberFormatter
{
    /**
     * @var string|null
     */
    protected ?string $series = null;

    /**
     * @var string|null
     */
    protected ?string $number = null;

    public function getSeries(): ?string
    {
        return $this->series;
    }

    public function setSeries(?string $series): void
    {
        $this->series = $series;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }
}

