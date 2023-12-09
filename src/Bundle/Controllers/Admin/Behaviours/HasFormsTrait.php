<?php

declare(strict_types=1);

namespace Marktic\Billing\Bundle\Controllers\Admin\Behaviours;

trait HasFormsTrait
{
    public function getModelForm($model, $action = null)
    {
        $action = $action ?? $this->getAction();
        $class = $this->getModelFormClass($model, $action);
        $form = new $class();
        $form->setModel($model);

        return $form;
    }
}