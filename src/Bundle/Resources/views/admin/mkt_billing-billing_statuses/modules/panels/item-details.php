<?php
declare(strict_types=1);

use ByTIC\AdminBase\Screen\Actions\Dto\ButtonAction;
use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;
use Marktic\Billing\Utility\BillingModels;

$item = $item ?? $this->item;
$billingStatus = $billingStatus ?? ($this->billingStatus ?? $item->getBillingStatus());

$billingStatusesRepository = $billingStatusesRepository ?? BillingModels::billingStatuses();

$card = Card::make()
    ->withTitle($billingStatusesRepository->getLabel('title.singular'))
    ->withIcon(Icons::list_ul())
    ->addHeaderTool(
        ButtonAction::make()
            ->setUrl($billingStatus->compileURL('edit'))
            ->addHtmlClass('btn-xs')
            ->setLabel(translator()->trans('edit'))
    )
    ->withTheme('inverse')
    ->wrapBody(false)
    ->withView($this)
    ->withViewContent(
        '/mkt_billing-billing_statuses/modules/item/details',
        ['billingStatus' => $billingStatus, 'billingStatusesRepository' => $billingStatusesRepository]
    );
?>
<?= $card; ?>
