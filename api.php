<?php
    //values for example
    declare(strict_types=1);

function encode(string $input): string
    {
        $encoded = '';
        $length = strlen($input);
        $count = 1;

        for ($i = 0; $i < $length; $i++) {
            $currentChar = $input[$i];
            $nextChar = ($i + 1 < $length) ? $input[$i + 1] : '';

            if ($currentChar === $nextChar) {
                $count++;
            } else {
                $encoded .= ($count > 1 ? $count : '') . $currentChar;
                $count = 1;
            }
        }

        return $encoded;
    }

function decode(string $input): string
    {
        $decoded = '';
        $length = strlen($input);
        $count = '';

        for ($i = 0; $i < $length; $i++) {
            $currentChar = $input[$i];

            if (ctype_digit($currentChar)) {
                $count .= $currentChar;
            } else {
                $repeatCount = ($count !== '' ? intval($count) : 1);
                $decoded .= str_repeat($currentChar, $repeatCount);
                $count = '';
            }
        }

        return $decoded;
    }

?>
