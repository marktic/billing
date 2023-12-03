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

    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-promotion-form');

        $this->addButton('save', translator()->trans('submit'));
    }

    /**
     * @return void
     */
    public function getDataFromModel()
    {
        parent::getDataFromModel();
        $this->getDataFromModelForAmounts();
    }

    /**
     * @return void
     */
    public function saveToModel()
    {
        parent::saveToModel();
        $this->saveToModelAmounts();
    }

    /**
     * @return void
     */
    public function processValidation()
    {
        parent::processValidation();
        $this->validateAmounts();
    }
}
