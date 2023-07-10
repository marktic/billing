<?php

namespace Marktic\Billing\InvoiceParties\Dto;

interface InvoicePartyInterface
{
    public function isCompany(): bool;

    public function isPerson(): bool;
}

