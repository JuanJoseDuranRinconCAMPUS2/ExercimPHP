<?php

declare(strict_types=1);
$text = "Hello I am a text string";
function reverseString(string $text): string
{
    return strrev($text);
}

echo reverseString($text);
?>
