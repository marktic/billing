<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasIdentifier;

trait RecordHasIdentifier
{
    protected ?string $identifier = null;

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): void
    {
        $this->identifier = $identifier;
    }
}
