<?php

use Marktic\Billing\PostalAddresses\Models\PostalAddress;

$address = new PostalAddress();
$address->setStreetName('Test Address');
$address->setAdditionalStreetName('Test Address 2');
$address->setPostalZone('1');
$address->setCityName('Test City');
$address->setCountrySubentity('County');
$address->setCountry('RO');

return $address;