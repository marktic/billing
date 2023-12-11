<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin\Behaviours;

use Marktic\Billing\Base\Dto\AdminOwner;

trait HasOwnerTrait
{

    protected $owner;

    protected function getOwner()
    {
        if ($this->owner === null) {
            $this->setOwner($this->getOwnerFromRequest());
        }

        return $this->owner;
    }

    protected function generateOwner()
    {
        $owner = $this->getOwnerFromRequest();
        if ($owner) {
            return $owner;
        }
        return $this->generateOwnerDefault();
    }

    protected function getOwnerFromRequest()
    {
        $owner = $this->getRequest()->get('owner');
        if ($owner instanceof AdminOwner) {
            return $owner;
        }

        return null;
    }

    protected function setOwner($owner)
    {
        $this->owner = $owner;
    }

    abstract protected function generateOwnerDefault();
}