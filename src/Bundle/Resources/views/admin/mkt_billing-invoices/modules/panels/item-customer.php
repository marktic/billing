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
    ->withViewContent('/mkt_billing-parties/modules/item/details', ['item' => $this->customerParty]);
if ($this->customerParty) {
    $card->addHeaderTool(
        ButtonAction::make()
            ->setUrl($this->customerParty->compileURL('edit'))
            ->addHtmlClass('btn-xs')
            ->setLabel('Edit')
    );

    if ($this->customerParty->isCompany()) {
        $card->addHeaderTool(
            ButtonAction::make()
                ->setUrl($this->customerParty->compileURL('convertPerson'))
                ->addHtmlClass('btn-xs')
                ->addHtmlClass('btn-warning')
                ->setLabel('Convert to person')
        );
    }
}
?>
<?= $card; ?>