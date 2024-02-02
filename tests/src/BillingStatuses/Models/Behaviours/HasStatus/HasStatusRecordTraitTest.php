<?php

namespace Marktic\Billing\Tests\BillingStatuses\Models\Behaviours\HasStatus;

use Marktic\Billing\BillingStatuses\Models\Behaviours\HasStatus\HasStatusRecordTrait;
use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\BillingStatuses\Models\BillingStatuses;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class HasStatusRecordTraitTest extends TestCase
{
    /**
     * @param $value
     * @param $expected
     * @return void
     * @dataProvider data_getStatus
     */
    public function test_getStatus($value, $expected)
    {
        $test = new BillingStatus();

        $manager = new BillingStatuses();
        $test->setManager($manager);

        $test->fill(['status' => $value]);
        self::assertInstanceOf($expected, $test->getStatus());
    }

    public function data_getStatus()
    {
        return [
            ['pending', \Marktic\Billing\BillingStatuses\Statuses\Pending::class],
            ['billable', \Marktic\Billing\BillingStatuses\Statuses\Billable::class],
            ['failed', \Marktic\Billing\BillingStatuses\Statuses\Failed::class],
            ['nonbillable', \Marktic\Billing\BillingStatuses\Statuses\Nonbillable::class],
            ['trial', \Marktic\Billing\BillingStatuses\Statuses\Trial::class],
            ['discount', \Marktic\Billing\BillingStatuses\Statuses\Discount::class],
            ['billed', \Marktic\Billing\BillingStatuses\Statuses\Billed::class],
            ['completed', \Marktic\Billing\BillingStatuses\Statuses\Completed::class],
        ];
    }
}
