<?php

namespace Marktic\Billing\Base\Events;

use ByTIC\EventDispatcher\Events\Dispatchable;
use ByTIC\EventDispatcher\Events\GenericEvent;

/**
 *
 */
abstract class AbstractEvent extends GenericEvent
{
    use Dispatchable;
}
