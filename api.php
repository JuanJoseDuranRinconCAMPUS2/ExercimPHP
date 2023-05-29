<?php
    //values for example
    declare(strict_types=1);

    function acronym(string $text): string
    {
        if (str_word_count($text) === 1) {
            return '';
        }
        preg_match_all('/^\D|(?<!\p{Lu})(\p{Lu})|(?<=[ -])(\p{Ll})/u', $text, $matches);
        return mb_strtoupper(implode('',$matches[0]));
    }

?>
