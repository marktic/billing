<?php

use Marktic\Billing\Parties\Models\Party;

$party = new Party();
$party->setName('Test');
$party->setIdentification('123456789');

$partyAddress = require dirname(__DIR__,2) . '/PostalAddresses/BaseDemoAddress/address.php';

$party = Mockery::mock($party)->makePartial();
$party->shouldReceive('getBillingPostalAddress')->andReturn($partyAddress);

return $party;