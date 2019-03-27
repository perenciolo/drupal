<?php

namespace Drupal\cpf\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the Cpf constraint.
 */
class CpfConstraintValidator extends ConstraintValidator
{

    /**
     * { @inheritdoc }
     */
    public function validate($items, Constraint $constraint)
    {
        foreach ($items as $item) {
            // First check if the value is an integer.
            if (!is_int($item->value)) {
                // The value is not an integer, so a violation,
                // aka error, is applied.
                // The type of violation applied comes from the
                // constraint description
                // in step 1.
                $this->context->addViolation(
                    $constraint->notInteger,
                    ['%value' => $item->value]
                );
            }

            // Next check if the value is unique.
            if (!\Drupal::service('cpf')->isValid($item->value)) {
                $this->context->addViolation(
                    $constraint->message,
                    ['%value' => $item->value]
                );
            }
        }
    }

    /**
     * Is unique?
     *
     * @param string $value
     */
    private function isUnique($value)
    {
        // Here is where the check for a unique value would happen.
    }

}
