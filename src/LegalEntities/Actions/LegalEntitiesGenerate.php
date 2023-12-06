<?php

namespace Marktic\Billing\LegalEntities\Actions;

use Bytic\Actions\Action;
use Marktic\Billing\Base\Actions\Behaviours\GenerateFromDataTrait;
use Marktic\Billing\Base\Actions\Behaviours\HasOwnerRecordTrait;

class LegalEntitiesGenerate extends Action
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
                ['identification = ?', $this->getDataValue('identification')],
            ]
        ];
    }

    protected function orCreateData($data = []): array
    {
        $default = [
            'owner' => $this->getOwnerType(),
            'owner_id' => $this->getOwnerId(),
        ];
        foreach (['identification', 'name'] as $field) {
            $default[$field] = $this->getDataValue($field);
        }
        return array_merge($default, $data);
    }
}
