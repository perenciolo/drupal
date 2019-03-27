<?php

namespace Drupal\cpf\Plugin\Field\FieldFormatter;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'CpfDefaultFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "CpfDefaultFormatter",
 *   label = @Translation("Cpf"),
 *   field_types = {
 *     "Cpf"
 *   }
 * )
 */
class CpfDefaultFormatter extends FormatterBase
{

    /**
     * Define how the field type is showed.
     *
     * Inside this method we can customize how the field is displayed inside
     * pages.
     */
    public function viewElements(FieldItemListInterface $items, $langcode)
    {

        $elements = [];
        foreach ($items as $delta => $item) {
            $elements[$delta] = [
                '#type' => 'markup',
                '#markup' => $item->cpf,
            ];
        }

        return $elements;
    }

} // class
