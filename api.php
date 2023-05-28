<?php
    //values for example
    declare(strict_types=1);

    function isValid(string $number): bool
    {
        $number = str_replace(' ', '', $number);

        if (!ctype_digit($number) || empty($number)) {
            return false;
        }

        $sum = 0;
        $numDigits = strlen($number);

        for ($i = $numDigits - 1; $i >= 0; $i--) {
            $digit = (int)$number[$i];

            if (($numDigits - $i) % 2 === 0) {
                $digit *= 2;
                $digit -= ($digit > 9) ? 9 : 0;
            }

            $sum += $digit;
        }

        return $sum % 10 === 0;
    }
?>
