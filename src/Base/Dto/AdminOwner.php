<?php

namespace Marktic\Billing\Base\Dto;

class AdminOwner
{
    public const TYPE = 'admin';

    public int $id = 0;

    public string $type = self::TYPE;
}

