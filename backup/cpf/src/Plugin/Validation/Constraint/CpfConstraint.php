<?php

namespace Drupal\cpf\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a valid.
 *
 * @Constraint(
 *   id = "CpfIsValid",
 *   label = @Translation("Valid CPF", context = "Validation"),
 *   type = "string"
 * )
 */
class CpfConstraint extends Constraint
{

    public $message = 'The CPF number %value is not valid';

}
