<?php
    //values for example
    declare(strict_types=1);

    
    class SimpleCipher
    {
        public string $key;

        public function __construct(string $key = null)
            {
            if ($key === '') {
                throw new InvalidArgumentException('Key must not be empty');
            }

            $key = $key ?? $this->getRandomKey();

            if (!ctype_lower($key)) {
                throw new InvalidArgumentException('Key must be lowercase alphabets only');
            }

            $this->key = $key;
            }

    private function getRandomKey(): string
    {
        $chars = range('a', 'z');
        $key = '';
        for ($i = 0; $i < 80; $i++) {
            $key .= $chars[random_int(0, 25)];
        }
        return $key;
    }

    public function encode(string $plainText): string
    {
        $encoded = '';
        $keyLen = strlen($this->key);

        foreach (str_split($plainText) as $i => $operation) { //the text is transformed into an array
            $key = ord($this->key[$i % $keyLen]) - ord('a');
            $operation = (ord($operation) - ord('a') + $key) % 26 + ord('a');
            //calculates the offset required for each character in the text based on the corresponding character in the key. The offset is calculated by subtracting the numeric value of 'a' from the numeric value of the key character.
            $encoded .= chr($operation);
        }

        return $encoded;
    }

    public function decode(string $cipherText): string
    {
        $decoded = '';
        $keyLen = strlen($this->key);

        foreach (str_split($cipherText) as $i => $operation) {
            $key = ord($this->key[$i % $keyLen]) - ord('a');
            $operation = (ord($operation) - ord('a') - $key + 26) % 26 + ord('a');
            $decoded .= chr($operation);
        }

        return $decoded;
    }
}
     
?>
