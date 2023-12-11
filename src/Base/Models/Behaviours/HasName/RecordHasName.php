<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasName;

trait RecordHasName
{
    protected ?string $name = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        if ($name === '') {
            $name = null;
        }
        $this->name = $name;
    }

    public function printNameHTML(): string
    {
        return nl2br($this->getName());
    }
}
