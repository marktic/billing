<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Frontend\Parties\Behaviours;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasContactFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasLegalEntityFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPartyFieldsTrait;
use Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\HasPostalAddressesFieldsTrait;
use Nip\Records\Record;

trait CompleteDataFormTrait
{
     use \Marktic\Billing\Bundle\Forms\Base\Parties\Behaviours\CompleteDataFormTrait;
}

