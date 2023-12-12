<?php

namespace Marktic\Billing\Tests\PostalAddresses\Actions\Invoicetic;

use Marktic\Billing\PostalAddresses\Actions\Invoicetic\PostalAddressGenerate;
use PHPUnit\Framework\TestCase;

class PostalAddressGenerateTest extends TestCase
{
    public function test_handle()
    {
        $party = $this->generateNewAddress();

        $eParty = PostalAddressGenerate::for($party)->handle();
        $serialized = $eParty->serialize();

        self::assertJson($serialized);
        self::assertJsonStringEqualsJsonFile(
            TEST_FIXTURE_PATH . '/PostalAddresses/BaseDemoAddress/address.json',
            $serialized
        );
    }

    protected function generateNewAddress()
    {
        return require TEST_FIXTURE_PATH . '/PostalAddresses/BaseDemoAddress/address.php';
    }
}
