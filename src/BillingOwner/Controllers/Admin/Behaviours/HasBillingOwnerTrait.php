<?php

declare(strict_types=1);

namespace Marktic\Billing\BillingOwner\Controllers\Admin\Behaviours;

use Marktic\Billing\Base\Dto\AdminOwner;
use Marktic\Billing\BillingOwner\Dto\AnyOwner;

trait HasBillingOwnerTrait
{
    protected $billingOwner;

    protected function getBillingOwner()
    {
        if ($this->billingOwner === null) {
            $this->setBillingOwner($this->generateOwner());
        }

        return $this->billingOwner;
    }

    protected function checkBillingOwnerAccess($model): bool
    {
        $owner = $this->getBillingOwner();
        if ($owner instanceof AnyOwner) {
            return true;
        }
        if ($model == $owner) {
            return true;
        }
        return false;
    }

    protected function generateOwner()
    {
        $owner = $this->getOwnerFromRequest();
        if ($owner) {
            return $owner;
        }
        return $this->generateBillingOwnerDefault();
    }

    protected function getOwnerFromRequest()
    {
        $owner = $this->getRequest()->get('owner');
        if ($owner instanceof AdminOwner) {
            return $owner;
        }

        return null;
    }

    protected function setBillingOwner($billingOwner)
    {
        $this->billingOwner = $billingOwner;
    }

    abstract protected function generateBillingOwnerDefault();
}