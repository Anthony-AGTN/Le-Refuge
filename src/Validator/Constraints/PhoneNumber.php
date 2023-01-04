<?php

// src/Validator/Constraints/PhoneNumber.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PhoneNumber extends Constraint
{
    public string $message = 'Le numéro de téléphone "{{ value }}" n\'est pas valide.';

    public function validatedBy()
    {
        return PhoneNumberValidator::class;
    }
}
