<?php

namespace Marktic\Billing\Parties\Dto;

enum PartyType: string
{
    case INDIVIDUAL = 'individual';
    case COMPANY = 'company';
    case NON_PROFIT = 'non_profit';
    case GOVERNMENT_ENTITY = 'government_entity';
}
