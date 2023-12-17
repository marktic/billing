<?php

namespace Marktic\Billing\Base\HasSubject\Models\Behaviours\HasSubject;

use Marktic\Billing\Base\Dto\AdminOwner;
use Marktic\Billing\Utility\BillingUtility;
use Nip\Records\Collections\Collection;
use Nip\Records\Record;

/**
 */
trait HasSubjectRecordTrait
{

    protected ?string $subject = null;

    protected ?int $subject_id = null;

    public function populateFromSubjectRecord(Record $record): void
    {
        $this->subject_id = $record->id;
        $this->subject = BillingUtility::morphLabelFor($record);
        $this->getRelation('BillingSubject')->setResults($record);
    }

    public function getBillingSubject(): \Nip\Records\AbstractModels\Record|Collection|AdminOwner
    {
        return $this->getRelation('BillingSubject')->getResults();
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string|null $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return int|null
     */
    public function getSubjectId(): ?int
    {
        return $this->subject_id;
    }

    /**
     * @param int|null $subject_id
     */
    public function setSubjectId(?int $subject_id): void
    {
        $this->subject_id = $subject_id;
    }
}
