<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin;

use Marktic\Billing\BillingOwner\Dto\AdminOwner;
use Marktic\Billing\Bundle\Forms\Admin\Parties\CompleteDataForm;
use Marktic\Billing\Parties\Actions\BillingPartyCreateForSubject;
use Marktic\Billing\Parties\Models\Party;

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
        $form->setBillingOwner($action->getOwner());

        if ($form->execute()) {
            $this->viewRedirect($record);
        }

        $this->payload()->with([
            'item' => $record,
            'form' => $form,
        ]);
    }

    /**
     * @param Party $item
     * @return void
     */
    protected function viewRedirect($item = null)
    {
        $afterEdit = $this->getAfterUrl('edit');
        if (!$afterEdit) {
            $parent = $item->getBillingSubject();
            $this->setAfterUrlFlash(
                $parent->getURL(),
                $parent->getManager()->getController()
            );
        }
        parent::viewRedirect($item);
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