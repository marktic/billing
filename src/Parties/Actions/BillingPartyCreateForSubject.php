<?php

namespace Marktic\Billing\Parties\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\HasOwnerRecordTrait;
use Marktic\Billing\Base\Actions\Behaviours\HasResultRecordTrait;
use Marktic\Billing\Parties\Actions\Behaviours\HasRepository;
use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\Utility\BillingUtility;
use Nip\Collections\Collection;
use Nip\Records\AbstractModels\Record;

class BillingPartyCreateForSubject extends Action
{
    use HasRepository;
    use HasResultRecordTrait;
    use HasOwnerRecordTrait;

    protected Record $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public static function for($subject): static
    {
        return new static($subject);
    }

    public function handle(array $data): Party|Record|\Nip\Records\Collections\Collection|null
    {
        $party = $this->getResultRecord();
        $this->fillResultRecordWithData($data);
        return $party;
    }

    protected function fillResultRecordWithData($data)
    {
        
    }

    protected function populateResultRecord(): void
    {
        $this->populateRecordWithOwner($this->resultRecord);
        $this->populateRecordWithSubject($this->resultRecord);
    }

    protected function populateRecordWithSubject($record): void
    {
        $record->subject = BillingUtility::morphLabelFor($this->subject);
        $record->subject_id = $this->subject->id;
    }
}