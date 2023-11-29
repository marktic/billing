<?php

namespace Marktic\Billing\Parties\Dto;

interface PartyInterface
{
    public function isCompany(): bool;

    public function isPerson(): bool;
}

