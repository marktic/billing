<?php

namespace Marktic\Billing\Tests\BillingStatuses\Models\Behaviours\HasStatus;

use Marktic\Billing\BillingStatuses\Models\Behaviours\HasStatus\HasStatusRepositoryTrait;
use Marktic\Billing\BillingStatuses\Models\BillingStatuses;
use Marktic\Billing\BillingStatuses\Statuses\Billed;
use PHPUnit\Framework\TestCase;

class HasStatusRepositoryTraitTest extends TestCase
{
    public function test_getStatusItemsRootNamespace()
    {
        $item = new BillingStatuses();
        self::assertSame('Marktic\Billing\BillingStatuses\Statuses\\', $item->getStatusItemsRootNamespace());
    }

    public function test_getStatusItemsDirectory()
    {
        $item = new BillingStatuses();
        self::assertSame(
            [realpath(PROJECT_BASE_PATH . '/src/BillingStatuses/Statuses/')],
            $item->getStatusItemsDirectory());
    }

    public function test_getStatuses()
    {
        $item = new BillingStatuses();
        $statuses = $item->getStatuses();
        self::assertCount(6, $statuses);

        $billed = $statuses['billed'];
        self::assertSame('billed', $billed::NAME);
        self::assertInstanceOf(Billed::class, $billed);
    }

    public function test_getDefaultStatus()
    {
        $item = new BillingStatuses();
        self::assertSame('pending', $item->getDefaultStatus());
    }
}
