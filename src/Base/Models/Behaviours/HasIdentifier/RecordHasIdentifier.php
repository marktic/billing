<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasIdentifier;

trait RecordHasIdentifier
{
    protected ?string $identification = null;

    public function getIdentification(): ?string
    {
        return $this->identification;
    }

    public function setIdentification(?string $identification): void
    {
        $this->identification = $identification;
    }
}
