<?php

namespace Marktic\Billing\Base\Actions\Behaviours;

trait CanDoSave
{
    protected $doSave = false;

    public function doSave(bool $doSave): self
    {
        $this->doSave = $doSave;
        return $this;
    }

    protected function triggerSave()
    {
        if ($this->doSave) {
            $this->getSubject()->save();
        }
    }
}