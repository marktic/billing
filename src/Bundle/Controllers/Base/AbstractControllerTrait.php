<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Base;

use Nip\Controllers\Response\ResponsePayload;
use Nip\View\View;

/**
 * @method ResponsePayload payload()
 */
trait AbstractControllerTrait
{
    use \Nip\Controllers\Traits\AbstractControllerTrait;

    public function registerViewPaths(View $view): void
    {
        parent::registerViewPaths($view);
        $this->registerViewPathsBilling($view);
    }

    abstract protected function registerViewPathsBilling(View $view): void;
}
