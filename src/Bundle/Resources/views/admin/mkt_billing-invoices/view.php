<?= $this->Flash()->render($this->controller); ?>

<div class="row">
    <div class=" col-md-4">
        <?= $this->load("/mkt_billing-invoices/modules/panels/item-details"); ?>
    </div>
    <div class="col-md-8">
        <?= $this->load("/mkt_billing-invoices/modules/panels/item-items"); ?>
    </div>
</div>