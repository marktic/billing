<?php

namespace Marktic\Billing\BillingOwner\Dto;

class AdminOwner implements BillingOwner
{
    public const TYPE = 'any';

    public int $id = 0;

    public string $type = self::TYPE;
}

