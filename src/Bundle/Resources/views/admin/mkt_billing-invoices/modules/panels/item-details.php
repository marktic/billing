<?php
declare(strict_types=1);

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;

$card = Card::make()
    ->withTitle(translator()->trans('details'))
    ->withIcon(Icons::list_ul())
    ->addHeaderTool(
        ButtonAction::make()
            ->setUrl($this->item->compileURL('edit'))
            ->addHtmlClass('btn-xs')
            ->setLabel(translator()->trans('edit'))
    )
    ->withTheme('inverse')
    ->wrapBody(false)
    ->withView($this)
    ->withViewContent('/mkt_billing-invoices/modules/item/details');
?>
<?= $card; ?>
