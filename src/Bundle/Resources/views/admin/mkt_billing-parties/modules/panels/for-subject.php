<?php

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Marktic\Billing\Utility\BillingModels;

$party = $this->billingParty ?? null;
$partyCreateUrl = $this->billingPartyCreateUrl ?? null;

$partiesRepository = BillingModels::parties();

$card = Card::make()
    ->withTitle($partiesRepository->getLabel('title'))
    ->withIcon(Icons::list_ul())
    ->wrapBody(false)
    ->withView($this)
    ->withViewContent('/mkt_billing-parties/modules/item/details', []);

if ($party) {
    $btnUrl = $party->compileURL('edit');
    $btnLabel = translator()->trans('edit');
} else {
    $btnUrl = $partyCreateUrl;
    $btnLabel = $partiesRepository->getLabel('create');
}
    $card->addHeaderTool(
            ButtonAction::make()
                ->setUrl($btnUrl)
                ->addHtmlClass('btn-xs')
                ->setLabel($btnLabel)
        );
?>
<?= $card; ?>
