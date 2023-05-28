<?php
    //values for example
    declare(strict_types=1);

    class Robot {
        public $name;
        private static $names = [];

        public function __construct() {
            $this->reset();
        }

        public function getName(): string {
            return $this->name;
        }

        public function reset(): void {
            $letters = range('A', 'Z');
            $this->name = $letters[rand(0, 25)] . $letters[rand(0, 25)] . rand(100, 999);

            if (in_array($this->name, self::$names)) {
                $this->reset();
            } else {
                self::$names[] = $this->name;
            }
        }
    }

?>
