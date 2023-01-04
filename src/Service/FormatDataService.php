<?php

namespace App\Service;

use App\Validator\Constraints\PhoneNumberValidator;

class FormatDataService
{
    /**
     * Format a phone number.
     * The phone number must be a string of 10 digits.
     * The phone number is formatted with spaces every 2 digits.
     * @param string|null $phone
     * @return string|null
     */
    public static function formatPhone(?string $phone): ?string
    {
        if (preg_match(PhoneNumberValidator::$frPhoneNumRegex, $phone)) {
            return trim(chunk_split($phone, 2, ' '));
        }
        return $phone;
    }

    /**
     * Format a phone number.
     * The phone number is formated for delete spaces.
     * @param string|null $phone
     * @return string|null
     */
    public static function formatPhoneDeleteSpace(?string $phone): ?string
    {
        if (preg_match(PhoneNumberValidator::$frPhoneNumSpaceRegex, $phone)) {
            return trim(str_replace(' ', '', $phone));
        }
        return $phone;
    }
}
