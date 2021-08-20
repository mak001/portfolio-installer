<?php

namespace Mak001\Portfolio\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\FormField;

class FormFieldExtension extends Extension
{

    /**
     * @param FormField $form_field
     */
    public function onBeforeRender(FormField $form_field)
    {
        /* We don't want this in the CMS */
        if ($this->owner->isAdminURL()) {
            return;
        }

        if ($form_field instanceof FormAction) {
            if ($form_field->getAttribute('type') == 'submit') {
                $form_field->removeExtraClass('btn-primary')->addExtraClass('btn-dark');
            } else {
                $form_field->removeExtraClass('btn-secondary')->addExtraClass('btn-outline-dark');
            }
        }
    }
}
