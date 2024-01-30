<?php

use Marktic\Billing\Bundle\Forms\Admin\Parties\AbstractForm;
use Marktic\Billing\Utility\BillingModels;

/** @var AbstractForm $form */
$form = $form ?? $this->form;
$renderer = $renderer ?? $form->getRenderer();
?>
<fieldset class="mt-4">
    <legend class="fs-6 fw-bold text-primary w-auto">
        <?= BillingModels::postalAddresses()->getLabel('title.singular'); ?>
    </legend>

    <?php
    $hasAdditionalAddress = $form->hasElement('postal_address[additional_street_name]');
    ?>
    <div class="row">
        <div class="<?= $hasAdditionalAddress ? 'col-md-6' : 'col'; ?>">
            <?= $renderer->renderRow($form->getElement('postal_address[street_name]')); ?>
        </div>
        <?php if ($hasAdditionalAddress) { ?>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[additional_street_name]')); ?>
            </div>
        <?php } ?>
    </div>

    <?php
    $hasPostalZone = $form->hasElement('postal_address[postal_zone]');
    ?>
    <div class="row">
        <div class="<?= $hasPostalZone ? 'col-md-6' : 'col-md-4'; ?>">
            <?= $renderer->renderRow($form->getElement('postal_address[city_name]')); ?>
        </div>
        <?php if ($hasPostalZone) { ?>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[postal_zone]')); ?>
            </div>
        <?php } ?>
        <div class="<?= $hasPostalZone ? 'col-md-6' : 'col-md-4'; ?>">
            <?= $renderer->renderRow($form->getElement('postal_address[country_subentity]')); ?>
        </div>
        <div class="<?= $hasPostalZone ? 'col-md-6' : 'col-md-4'; ?>">
            <?= $renderer->renderRow($form->getElement('postal_address[country]')); ?>
        </div>
    </div>
</fieldset>
