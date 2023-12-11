<?= $this->Flash()->render($this->controller); ?>

<div class="row">
    <div class=" col-md-4">
        <div class="d-grid gap-3">
            <?= $this->load("/mkt_billing-invoices/modules/panels/item-details"); ?>
            <?= $this->load("/mkt_billing-invoices/modules/panels/item-communications"); ?>
        </div>
    </div>
    <div class="col-md-8">
        <?= $this->load("/mkt_billing-invoices/modules/panels/item-items"); ?>
    </div>
</div>