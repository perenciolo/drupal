<?php

namespace Drupal\cpf_validation\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'CpfDefaultWidget' widget.
 *
 * @category     Field
 * @FieldWidget(
 *   id = "CpfDefaultWidget",
 *   label = @Translation("CPF select"),
 *   field_types = {
 *     "Cpf"
 *   }
 * )
 * @package      Field_Types
 * @author       Gustavo Perenciolo <contategustavoh@gmail.com>
 * @license      GNU GPL
 * @link         <google.com>
 */
class CpfDefaultWidget extends WidgetBase
{
    /**
     * Define the form for the field type.
     *
     * Inside this method we can define the form used to edit the field type.
     *
     * Here there is a list of allowed element types: https://goo.gl/XVd4tA
     *
     * @param FieldItemListInterface $items     list
     * @param Array                  $delta     array
     * @param Array                  $element   element
     * @param Array                  $form      form
     * @param FormStateInterface     $formState form state
     *
     * @return Array $element
     */
    public function formElement(
        FieldItemListInterface $items,
        $delta,
        array $element,
        array &$form,
        FormStateInterface $formState
    ) {
        $element['cpf'] = [
            '#type' => 'textfield',
            '#title' => t('CPF'),

            // Set here the current value for this field, or a default value (or
            // null) if there is no a value
            '#default_value' => isset($items[$delta]->cpf) ?
            $items[$delta]->cpf : null,

            '#empty_value' => '',
            '#placeholder' => t('CPF'),
        ];

        return $element;
    }
}
