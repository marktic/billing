<?php

namespace Marktic\Billing\Tests\Invoices\Actions\Generator\Behaviours;

use Marktic\Billing\Invoices\Actions\Generator\Behaviours\HasBillingOwnerTrait;
use Marktic\Billing\Tests\Fixtures\Invoices\Actions\BasicGenerator;
use PHPUnit\Framework\TestCase;

class HasBillingOwnerTraitTest extends TestCase
{
    public function test_billingOwner_default_null()
    {
        $action = new BasicGenerator();
        static::assertFalse($action->hasBillingOwner());

        $action->setBillingOwner(null);
        static::assertFalse($action->hasBillingOwner());

        $action->setBillingOwner(false);
        static::assertTrue($action->hasBillingOwner());
    }
}
