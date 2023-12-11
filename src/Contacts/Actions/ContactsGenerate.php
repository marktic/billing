<?php

namespace Marktic\Billing\Contacts\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\GenerateFromDataTrait;
use Marktic\Billing\Base\HasOwner\Actions\Behaviours\HasOwnerRecordTrait;
use Marktic\Billing\Contacts\Actions\Identification\GenerateIdentification;
use Marktic\Billing\Contacts\Models\Contact;

/**
 * @method Contact fetch
 */
class ContactsGenerate extends Action
{
    use Behaviours\HasRepository;
    use GenerateFromDataTrait;
    use HasOwnerRecordTrait;

    protected function findParams(): array
    {
        return [
            'where' => [
                ['owner = ?', $this->getOwnerType()],
                ['owner_id = ?', $this->getOwnerId()],
                ['identification = ?', $this->getDataIdentification()],
            ]
        ];
    }

    protected function orCreateData($data = []): array
    {
        $default = [
            'owner' => $this->getOwnerType(),
            'owner_id' => $this->getOwnerId(),
            'identification' => $this->getDataIdentification(),
        ];
        foreach (['name', 'telephone', 'email'] as $field) {
            $default[$field] = $this->getDataValue($field);
        }
        return array_merge($default, $data);
    }

    protected function getDataIdentification()
    {
        $identification = $this->getDataValue('identification');
        if ($identification == null) {
            $identification = GenerateIdentification::fromData($this->allAttributes())->handle();
        }
        return $identification;
    }
}
