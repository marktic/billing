<?php

namespace Marktic\Billing\BillingStatuses\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\GenerateFromDataTrait;
use Marktic\Billing\BillingOwner\Actions\Behaviours\HasOwnerRecordTrait;
use Marktic\Billing\BillingStatuses\Actions\Behaviours\HasRepository;
use Marktic\Billing\BillingStatuses\Models\BillingStatus;
use Marktic\Billing\BillingSubject\Models\BillingSubjectRecordTrait;
use Marktic\Billing\Utility\BillingUtility;
use Nip\Records\AbstractModels\Record;

class BillingStatusCreateForSubject extends Action
{
    use HasRepository;
    use GenerateFromDataTrait;
    use HasOwnerRecordTrait;

    /**
     * @var Record|BillingSubjectRecordTrait
     */
    protected Record $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public static function forSubject($subject): static
    {
        return new static($subject);
    }

    public function handle(array $data): BillingStatus|Record|\Nip\Records\Collections\Collection|null
    {
        $party = $this->getResultRecord();
        $this->fillResultRecordWithData($data);
        return $party;
    }

    protected function fillResultRecordWithData($data): void
    {
        $record = $this->getResultRecord();
        $data['status'] = $data['status'] ?? $this->generateRepository()->getDefaultStatus();
        $record->fill($data);
    }

    protected function populateResultRecord(): void
    {
        $this->populateRecordWithSubject($this->subject);
    }

    protected function populateRecordWithSubject($record): void
    {
        $record->subject = BillingUtility::morphLabelFor($this->subject);
        $record->subject_id = $this->subject->id;
    }
    protected function findParams(): array
    {
        return [
            'where' => [
                ['subject = ?', BillingUtility::morphLabelFor($this->subject)],
                ['subject_id = ?', $this->subject->id],
            ],
        ];
    }
    protected function orCreateData($data) {
        $data['subject'] = $data['subject'] ?? BillingUtility::morphLabelFor($this->subject);
        $data['subject_id'] = $data['subject_id'] ?? $this->subject->id;
        $data['currency'] = $data['currency'] ?? $this->subject->getBillingCurrency();
        return $data;
    }
}
