<?php

// src/Validator/Constraints/PhoneNumberValidator.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PhoneNumberValidator extends ConstraintValidator
{
    // Expression régulière pour les numéros de téléphone français
    public static string $frPhoneNumRegex = '/^0[1-9][0-9]{8}$/';
    // Expression régulière pour les numéros de téléphone français avec espaces
    public static string $frPhoneNumSpaceRegex = '/^0[1-9]\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}$/';

    public function validate(mixed $value, Constraint $constraint) : void
    {
        // Vérifie si la valeur est vide (par exemple, si le champ n'est pas obligatoire)
        if (null === $value || '' === $value) {
            return;
        }

        // Si la valeur ne correspond pas à l'expression régulière, ajoutez une violation
        if (!preg_match(self::$frPhoneNumRegex, $value)) {
            if (!preg_match(self::$frPhoneNumSpaceRegex, $value)) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $value)
                    ->addViolation();
            }
        }
    }
}
