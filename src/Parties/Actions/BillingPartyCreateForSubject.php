<?php

namespace Marktic\Billing\Parties\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\GenerateFromDataTrait;
use Marktic\Billing\BillingOwner\Actions\Behaviours\HasOwnerRecordTrait;
use Marktic\Billing\Parties\Actions\Behaviours\HasRepository;
use Marktic\Billing\Parties\Actions\Identification\GenerateIdentification;
use Marktic\Billing\Utility\BillingUtility;
use Nip\Records\AbstractModels\Record;

class BillingPartyCreateForSubject extends Action
{
    use HasRepository;
    use GenerateFromDataTrait;
    use HasOwnerRecordTrait;

    protected Record $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public static function forSubject($subject): static
    {
        return new static($subject);
    }

    protected function findParams(): array
    {
        return [
            'where' => [
                ['owner = ?', $this->getOwnerType()],
                ['owner_id = ?', $this->getOwnerId()],
                ['subject = ?', BillingUtility::morphLabelFor($this->subject)],
                ['subject_id = ?', $this->subject->id],
            ]
        ];
    }

    protected function getDataIdentification()
    {
        $identification = $this->getDataValue('identification');
        if ($identification == null) {
            $identification = GenerateIdentification::fromData($this->allAttributes())->handle();
        }
        return $identification;
    }

    protected function orCreateData($data)
    {
        $data = $this->orCreateDataBillingOwner($data);
        $data = $this->orCreateDataBillingSubject($data);
        $this->setAttributes($data);
        $data['identification'] = $this->getDataIdentification();
        return $data;
    }

    protected function orCreateDataBillingSubject($data)
    {
        $data['subject'] = BillingUtility::morphLabelFor($this->subject);
        $data['subject_id'] = $this->subject->id;
        return $data;
    }
}