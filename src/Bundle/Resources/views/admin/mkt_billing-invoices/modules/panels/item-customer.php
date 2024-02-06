<?php
declare(strict_types=1);

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Marktic\Billing\Utility\BillingModels;

$card = Card::make()
    ->withTitle(BillingModels::parties()->getLabel('title.singular'))
    ->withIcon(Icons::list_ul())
    ->wrapBody(false)
    ->withView($this)
    ->addHeaderTool(
        ButtonAction::make()
            ->setUrl($this->customerParty->compileURL('edit'))
            ->addHtmlClass('btn-xs')
            ->setLabel('Edit')
    )
    ->withViewContent('/mkt_billing-parties/modules/item/details', ['item' => $this->customerParty]);
?>
<?= $card; ?>