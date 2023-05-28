<?php
    //values for example
    declare(strict_types=1);

    function isIsogram(string $word): bool
    {
        $word = str_replace([' ', '-'], '', $word);
        $word = mb_strtolower($word, 'UTF-8');
        return count(array_unique(mb_str_split($word))) === mb_strlen($word);
    }
    
?>
