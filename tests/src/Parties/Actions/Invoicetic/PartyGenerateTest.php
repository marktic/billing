<?php

namespace Marktic\Billing\Tests\Parties\Actions\Invoicetic;

use Marktic\Billing\Parties\Actions\Invoicetic\PartyGenerate;
use PHPUnit\Framework\TestCase;

class PartyGenerateTest extends TestCase
{
    public function test_handle()
    {
        $party = $this->generateNewParty();

        $eParty = PartyGenerate::for($party)->handle();
        $serialized = $eParty->serialize();

        self::assertJson($serialized);
        self::assertJsonStringEqualsJsonFile(
            TEST_FIXTURE_PATH . '/Parties/BaseDemoParty/party.json',
            $serialized
        );
    }

    protected function generateNewParty()
    {
        return require TEST_FIXTURE_PATH . '/Parties/BaseDemoParty/party.php';
    }
}
