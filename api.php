<?php
    //values for example
    declare(strict_types=1);
    
    $date = "2023-05-27 11:30:00";
    function from(DateTimeImmutable $date): DateTimeImmutable
    {
        return $date->modify('+1000000000 seconds');
    }
    //this code works on the exercism page
    
?>
