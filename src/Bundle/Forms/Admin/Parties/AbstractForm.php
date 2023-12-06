<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Forms\Admin\Parties;

use Marktic\Billing\Parties\Models\Party;
use Marktic\Billing\Bundle\Library\Form\FormModel;

/**
 * @method Party getModel()
 */
abstract class AbstractForm extends FormModel
{

    public function initialize(): void
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-billing-form');

        $this->addButton('save', translator()->trans('submit'));
    }

}
