<?php
    //values for example
    declare(strict_types=1);
    class Bob
{
    public function respondTo(string $str): string
    {
        $str = trim($str);

        if (empty($str)) {
            return "Fine. Be that way!";
        } elseif ($this->isQuestion($str) && $this->isYelling($str)) {
            return "Calm down, I know what I'm doing!";
        } elseif ($this->isQuestion($str)) {
            return "Sure.";
        } elseif ($this->isYelling($str)) {
            return "Whoa, chill out!";
        }

        return "Whatever.";
    }

    private function isQuestion(string $str): bool
    {
        return substr($str, -1) === "?";
    }

    private function isYelling(string $str): bool
    {
        return $str === strtoupper($str) && preg_match("/[a-zA-Z]/", $str);
    }
}
?>
