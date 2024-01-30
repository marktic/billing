<?php

use Marktic\Billing\Bundle\Forms\Admin\Parties\AbstractForm;
use Marktic\Billing\Utility\BillingAssets;

/** @var AbstractForm $form */
$form = $this->form;
$renderer = $form->getRenderer();
?>

<?= $renderer->openTag(); ?>
<?= $renderer->renderHidden(); ?>
<?= $renderer->renderMessages(); ?>

<?php
$elementPartyType = $form->getElement('party[type]');
$partyTypeValue = $elementPartyType->getValue();
$elementPartyTypes = $elementPartyType->getElements();
$elementPartyType->setRendered(true);
?>
    <ul class="nav nav-tabs" id="party-type-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">
                <?= $elementPartyType->getLabel(); ?>:
            </a>
        </li>
        <?php foreach ($elementPartyTypes as $elementPartyTypeSub) { ?>
            <?php $isSelected = $elementPartyTypeSub->getValue() == $elementPartyType->getValue(); ?>
            <li class="nav-item">
                <a class="nav-link <?= $isSelected ? 'active' : null ?>"
                   aria-selected="<?= $isSelected ? 'true' : null ?>" aria-current="page"
                   href="#" data-bs-toggle="tab" type="button" role="tab"
                   data-bs-target="#billing-party-type-<?= $elementPartyTypeSub->getValue() ?>"
                   aria-controls="billing-party-type-<?= $elementPartyTypeSub->getValue() ?>">
                    <?= $elementPartyTypeSub->render(); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content" id="billing-party-type">
        <div class="tab-pane fade <?= $elementPartyType->getValue() == 'legal_entity' ? 'show active' : ''; ?>"
             id="billing-party-type-legal_entity" role="tabpanel"
             aria-labelledby="billing-party-type-legal_entity"
             tabindex="0">
            <div class="mt-3"></div>

            <?= $renderer->renderRow($form->getElement('legal_entity[name]')); ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $renderer->renderRow($form->getElement('legal_entity[identification]')); ?>
                </div>
                <div class="col-md-6">
                    <?= $renderer->renderRow($form->getElement('legal_entity[trading_id]')); ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade <?= $elementPartyType->getValue() == 'person' ? 'show active' : ''; ?>"
             id="billing-party-type-person" role="tabpanel"
             aria-labelledby="billing-party-type-person" tabindex="0">
            <div class="mt-3"></div>
        </div>
    </div>

    <fieldset class="mt-4">
        <legend class="fs-6 fw-bold text-primary w-auto">
            Contact
        </legend>

        <?= $renderer->renderRow($form->getElement('contact[name]')); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('contact[telephone]')); ?>
            </div>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('contact[email]')); ?>
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-4">
        <legend class="fs-6 fw-bold text-primary w-auto">
            Address
        </legend>

        <div class="row">
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[street_name]')); ?>
            </div>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[additional_street_name]')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[city_name]')); ?>
            </div>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[postal_zone]')); ?>
            </div>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[country_subentity]')); ?>
            </div>
            <div class="col-md-6">
                <?= $renderer->renderRow($form->getElement('postal_address[country]')); ?>
            </div>
        </div>
    </fieldset>
<?= $renderer->renderGroups(); ?>
<?= $renderer->renderElements(); ?>
<?= $renderer->renderButtons(); ?>
<?= $renderer->closeTag(); ?>

<?= BillingAssets::scriptInline('/party_form.js'); ?>