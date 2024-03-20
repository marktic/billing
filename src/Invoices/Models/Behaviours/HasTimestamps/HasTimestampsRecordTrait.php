<?php

namespace Marktic\Billing\Invoices\Models\Behaviours\HasTimestamps;

use Marktic\Billing\Base\Models\Behaviours\Timestampable\TimestampableTrait;

trait HasTimestampsRecordTrait
{
    use TimestampableTrait;

    public $issued_at;

    public function issuedAtNow(): void
    {
        $this->setIssuedAt(date('Y-m-d'));
    }

    public function setIssuedAt($issuedAt)
    {
        $this->issued_at = $issuedAt;
    }
}