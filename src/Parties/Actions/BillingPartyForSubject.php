<?php

namespace Marktic\Billing\Parties\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Parties\Actions\Behaviours\HasRepository;
use Marktic\Billing\Parties\Models\Party;
use Nip\Collections\Collection;
use Nip\Records\AbstractModels\Record;

class BillingPartyForSubject extends Action
{
    use HasRepository;

    protected Record $subject;

    protected bool $returnSingle = true;

    protected Collection|null $result = null;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public static function for($subject): static
    {
        return new static($subject);
    }

    public function handle(): Party|Record|\Nip\Records\Collections\Collection|null
    {
        return $this->generateResult();
    }

    public function returnSingle(bool $returnSingle = true): self
    {
        $this->returnSingle = $returnSingle;
        return $this;
    }

    public function returnCollection(bool $returnCollection = true): self
    {
        return $this->returnSingle(!$returnCollection);
    }

    protected function generateResult(): Record|Party|null
    {
        $result = $this->doSearch();
        if ($this->returnSingle) {
            return $result->current();
        }
        return $result;
    }

    protected function doSearch()
    {
        if ($this->result !== null) {
            return $this->result;
        }
        $this->result = $this->getRepository()->findyParams(
            [
                'where' => [
                    ['subject_type = ?', $this->subject->getManager()->getController()],
                    ['subject_id = ?', $this->subject->id],
                ],
            ]
        );
        return $this->result;
    }
}