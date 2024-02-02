<?php
declare(strict_types=1);

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;

$card = Card::make()
    ->withTitle('Metadata')
    ->withIcon(Icons::list_ul())
    ->withTheme('inverse')
    ->wrapBody(false)
    ->withView($this)
    ->withViewContent('/mkt_billing-invoices/modules/item/metadata');
?>
<?= $card; ?>
