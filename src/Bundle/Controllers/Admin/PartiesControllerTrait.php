<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\Bundle\Forms\Admin\Parties\CompleteDataForm;
use Marktic\Billing\Parties\Actions\BillingPartyCreateForSubject;

/**
 *
 */
trait PartiesControllerTrait
{
    use AbstractControllerTrait;
    use Behaviours\HasFormsTrait;

    public function createForSubject()
    {
        $action = $this->createForSubjectActionFromRequest();
        $record = $action->getResultRecord();

        /** @var CompleteDataForm $form */
        $form = $this->getModelForm($record, 'completeData');
        $form->setOwner($action->getOwner());

        if ($form->execute()) {
            $this->addRedirect($record);
        }

        $this->payload()->with([
            'item' => $record,
            'form' => $form,
        ]);
    }

    protected function createForSubjectActionFromRequest(): BillingPartyCreateForSubject
    {
        $subject = $this->checkForeignModelFromRequest(
            $this->getRequest()->get('subject'),
            'subject_id'
        );

        $action = BillingPartyCreateForSubject::forSubject($subject);
        $action->withOwner($this->createForSubjectOwner($action));
        return $action;
    }

    protected function createForSubjectOwner($action)
    {
        return new AdminOwner();
    }

    protected function getModelFormClass($model, $action = null): ?string
    {
        return match ($action) {
            'completeData', 'edit' => CompleteDataForm::class,
            default => null,
        };
    }
}