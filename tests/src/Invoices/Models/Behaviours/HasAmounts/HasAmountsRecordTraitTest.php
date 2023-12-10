<?php

namespace Marktic\Billing\Tests\Invoices\Models\Behaviours\HasAmounts;

use Marktic\Billing\Invoices\Models\Invoice;
use PHPUnit\Framework\TestCase;

class HasAmountsRecordTraitTest extends TestCase
{
    public function test_amount_money()
    {
        $record = new Invoice();
        $record->setAmount(1000);
        $record->setCurrency('EUR');

        self::assertEquals(1000, $record->getAmountMoney()->getAmount());
        self::assertEquals('EUR', $record->getAmountMoney()->getCurrency());
    }
}
