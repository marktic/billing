<?php

namespace Marktic\Billing\Base\Actions\Behaviours;

trait HasData
{

    public static function for(mixed $data = null)
    {
        return (new self())->setAttributes($data);
    }

    public function getDataValue($key, $default = null)
    {
        return $this->attributes[$key] ?? $default;
    }
}