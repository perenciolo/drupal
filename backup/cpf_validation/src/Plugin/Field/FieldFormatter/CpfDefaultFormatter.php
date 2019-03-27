<?php

namespace Drupal\cpf_validation\Plugin\Field\FieldFormatter;

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
 * @category        Field
 * @package         Field_Types
 * @author          Gustavo Perenciolo <contategustavoh@gmail.com>
 * @license         GNU GPL
 * @link            <google.com>
 */
class CpfDefaultFormatter extends FormatterBase
{
    /**
     * Define how the field type is showed.
     *
     * Inside this method we can customize how the field is displayed inside
     * pages.
     *
     * @param FieldItemListInterface $items    Items array
     * @param Lang                   $langcode Language
     *
     * @return $elements
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
}
