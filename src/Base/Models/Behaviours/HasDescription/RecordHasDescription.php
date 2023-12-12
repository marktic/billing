<?php

namespace Marktic\Billing\Base\Models\Behaviours\HasDescription;

trait RecordHasDescription
{
    protected ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        if ($description === '') {
            $description = null;
        }
        $this->description = $description;
    }

}
