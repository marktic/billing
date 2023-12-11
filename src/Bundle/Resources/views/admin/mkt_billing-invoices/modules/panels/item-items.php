<?php
declare(strict_types=1);

use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Marktic\Billing\Utility\BillingModels;

$card = Card::make()
    ->withTitle(BillingModels::invoiceLines()->getLabel('title'))
    ->withIcon(Icons::list_ul())
    ->wrapBody(false)
    ->withContent($this->load('/mkt_billing-invoice_lines/modules/lists/invoice', [], true));

echo $card;
?>