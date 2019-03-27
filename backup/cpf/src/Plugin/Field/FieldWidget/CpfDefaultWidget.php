<?php

namespace Drupal\cpf\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'CpfDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "CpfDefaultWidget",
 *   label = @Translation("Cpf select"),
 *   field_types = {
 *     "Cpf"
 *   }
 * )
 */
class CpfDefaultWidget extends WidgetBase
{

    /**
     * Define the form for the field type.
     *
     * Inside this method we can define the form used to edit the field type.
     *
     * Here there is a list of allowed element types: https://goo.gl/XVd4tA
     */
    public function formElement(
        FieldItemListInterface $items,
        $delta,
        array $element,
        array &$form,
        FormStateInterface $formState
    ) {

        // Street

        $element['cpf'] = [
            '#type' => 'textfield',
            '#title' => t('Cpf'),

            // Set here the current value for this field, or a default value (or
            // null) if there is no a value
            '#default_value' => isset($items[$delta]->cpf) ?
            $items[$delta]->cpf : null,

            '#empty_value' => '',
            '#placeholder' => t('Cpf'),
        ];

        return $element;
    }

} // class
