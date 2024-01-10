<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Frontend;

use Nip\Controllers\Response\ResponsePayload;
use Marktic\Billing\Bundle\Library\View\ViewUtility;
use Nip\View\View;

/**
 * @method ResponsePayload payload()
 */
trait AbstractControllerTrait
{
    use \Marktic\Billing\Bundle\Controllers\Base\AbstractControllerTrait;

    protected function registerViewPathsBilling(View $view): void
    {
        ViewUtility::registerViewPaths($view, 'frontend');
    }
}
