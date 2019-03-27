<?php

namespace Drupal\cpf_validation\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypeData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'cpf' field type.
 *
 * @FieldType(
 *   id = "Cpf",
 *   label = @Translation("CPF"),
 *   description = @Translation("Stores a CPF."),
 *   category = @Translation("Custom"),
 *   default_widget = "CpfDefaultWidget",
 *   default_formatter = "CpfDefaultFormatter"
 * )
 * @category   Field
 * @package    Field_Types
 * @author     Gustavo Perenciolo <contategustavoh@gmail.com>
 * @license    GNU GPL
 * @link       <google.com>
 */
class Cpf extends FieldItemBase
{

    /**
     * Field type properties definition.
     * 
     * Inside this method we defines all the fields (properties) that our 
     * custom field type will have.
     * 
     * Here there is a list of allowed property types: https://goo.gl/sIBBgO
     * 
     * @param StorageDefinition $storage storage definition
     * 
     * @return $properties
     */
    public static function propertyDefinitions(StorageDefinition $storage) 
    {

        $properties = [];

        $properties['cpf'] = DataDefinition::create('string')
        ->setLabel(t('CPF'))
        ->setDescription(t('The digits of the CPF.'));

        return $properties;
    }

    /**
     * Field type schema definition.
     * 
     * Inside this method we defines the database schema used to store data for 
     * our field type.
     * 
     * Here there is a list of allowed column types: https://goo.gl/YY3G7s
     * 
     * @param StorageDefinition $storage storage definition 
     * 
     * @return Array
     */
    public static function schema(StorageDefinition $storage) 
    {
        $columns = [];
        $columns['cpf'] = [
            'type' => 'text',
            'length' => 11
        ];

        return [
            'columns' => $columns,
            'indexes' => [],
        ];
    }

    /**
     * Define when the field type is empty. 
     * 
     * This method is important and used internally by Drupal. Take a moment
     * to define when the field type must be considered empty.
     * 
     * @return $isEmpty
     */
    public function isEmpty()
    {
        $isEmpty = empty($this->get('value')->getValue());

        return $isEmpty;
    }

}