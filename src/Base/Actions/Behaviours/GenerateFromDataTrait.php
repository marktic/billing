<?php

namespace Marktic\Billing\Base\Actions\Behaviours;

trait GenerateFromDataTrait
{
    use HasRepository;
    use HasResultRecordTrait;
    use HasData;
    use HasDefaultReturn;

    /**
     * @param array $data
     * @return $this
     */
    public function orCreate(array $data = []): self
    {
        $data = $this->orCreateData($data);
        $this->orReturn(function () use ($data) {
            return $this->createRecord($data);
        });

        return $this;
    }

    protected function orCreateData($data) {
        return $data;
    }
}