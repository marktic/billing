<?php

namespace Marktic\Billing\Base\Actions\Behaviours;

use Closure;

trait HasDefaultReturn
{
    protected $default = null;

    /**
     * @param null|Closure $default
     * @return $this
     */
    public function orReturn($default = null): self
    {
        $this->default = $default;

        return $this;
    }

    protected function getDefault()
    {
        return $this->default instanceof Closure ? ($this->default)() : $this->default;
    }
}