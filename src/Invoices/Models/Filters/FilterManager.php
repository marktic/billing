<?php

namespace Marktic\Billing\Invoices\Models\Filters;

use Nip\Records\Filters\FilterManager as CommonFilterManager;

/**
 * Class FilterManager
 * @package OngDb\Main\Models\Baskets\Orders\Filters
 */
class FilterManager extends CommonFilterManager
{
    public function init()
    {
        parent::init();

        $this->addFilter(
            $this->newFilter('Column\BasicFilter')->setField('status')
        );
    }
}
