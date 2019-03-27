<?php

namespace Drupal\cpf\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'Cpf' field type.
 *
 * @FieldType(
 *   id = "Cpf",
 *   label = @Translation("Cpf"),
 *   description = @Translation("Stores an Cpf."),
 *   category = @Translation("Custom"),
 *   default_widget = "CpfDefaultWidget",
 *   default_formatter = "CpfDefaultFormatter"
 * )
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
     */
    public static function propertyDefinitions(StorageDefinition $storage)
    {

        $properties = [];

        $properties['cpf'] = DataDefinition::create('string')
            ->setLabel(t('Cpf'));

        return $properties;
    }

    /**
     * Field type schema definition.
     *
     * Inside this method we defines the database schema used to store data for
     * our field type.
     *
     * Here there is a list of allowed column types: https://goo.gl/YY3G7s
     */
    public static function schema(StorageDefinition $storage)
    {

        $columns = [];
        $columns['cpf'] = [
            'type' => 'char',
            'length' => 255,
        ];

        return [
            'columns' => $columns,
            'indexes' => [],
        ];
    }

    public function getConstraints()
    {
        $constraint_manager = \Drupal::typedDataManager()
            ->getValidationConstraintManager();
        $constraints = parent::getConstraints();
        $constraints[] = $constraint_manager->create(
            'ComplexData',
            [
                'value' => [
                    'Length' => [
                        'max' => 14,
                        'maxMessage' => t(
                            'CPF may not be less than 14 characters.'
                        ),
                    ],
                ],
            ]
        );
        return $constraints;
    }

    /**
     * Define when the field type is empty.
     *
     * This method is important and used internally by Drupal. Take a moment
     * to define when the field fype must be considered empty.
     */
    public function isEmpty()
    {

        $isEmpty =
        empty($this->get('cpf')->getValue());

        return $isEmpty;
    }

} // class
