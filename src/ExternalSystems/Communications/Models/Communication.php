<?php

namespace Marktic\Billing\ExternalSystems\Communications\Models;

use Marktic\Billing\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class Invoice
 */
class Communication extends Record
{
    use CommunicationTrait;
    use CommonRecordTrait;

    public function getRegistry()
    {
        // TODO: Implement getRegistry() method.
    }

}
