<?php

namespace Marktic\Billing\Tests\Contacts\Models;

use Marktic\Billing\Contacts\Models\Contacts;
use Marktic\Billing\Tests\AbstractTest;
use function PHPUnit\Framework\assertSame;

class ContactsTest extends AbstractTest
{
    public function test_getController(): void
    {
        $repository = new Contacts();
        self::assertSame('mkt_billing-contacts', $repository->getController());
    }

//    public function test_translationSlug()
//    {
//        $repository = new Contacts();
//        assertSame('', $repository->getLabel('form.name'));
//    }
}

