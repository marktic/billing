<?php

namespace Marktic\Billing\PostalAddresses\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\GenerateFromDataTrait;
use Marktic\Billing\BillingOwner\Actions\Behaviours\HasOwnerRecordTrait;
use Marktic\Billing\PostalAddresses\Actions\Identification\GenerateIdentification;
use Marktic\Billing\PostalAddresses\Models\PostalAddress;

/**
 * @method PostalAddress fetch
 */
class PostalAddressesGenerate extends Action
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
        $default = $this->orCreateDataBillingOwner($data);
        $default['identification'] = $this->getDataIdentification();

        $fields = ['street_name', 'additional_street_name', 'city_name', 'postal_zone', 'country_subentity', 'country'];
        foreach ($fields as $field) {
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
