<?php
    //values for example
    declare(strict_types=1);

    class Robot
    {
        const DIRECTION_NORTH = 'NORTH';
        const DIRECTION_EAST ='EAST';
        const DIRECTION_SOUTH = 'SOUTH';
        const DIRECTION_WEST = 'WEST';
        /**
         *
         * @var int[]
         */
        public $position;
        /**
         *
         * @var string
         */
        public $direction;
    
        public function __construct(array $position, string $direction) {
            $this->position = $position;
            $this->direction = $direction;
        }
    
        public function turnRight(): self {
            $directions = [
                self::DIRECTION_NORTH => self::DIRECTION_EAST,
                self::DIRECTION_EAST => self::DIRECTION_SOUTH,
                self::DIRECTION_SOUTH => self::DIRECTION_WEST,
                self::DIRECTION_WEST => self::DIRECTION_NORTH
            ];
            $this->direction = $directions[$this->direction];
            return $this;
        }
    
        public function turnLeft(): self {
            $directions = [
                self::DIRECTION_NORTH => self::DIRECTION_WEST,
                self::DIRECTION_WEST => self::DIRECTION_SOUTH,
                self::DIRECTION_SOUTH => self::DIRECTION_EAST,
                self::DIRECTION_EAST => self::DIRECTION_NORTH
            ];
            $this->direction = $directions[$this->direction];
            return $this;
        }
    
        public function advance(): self {
            switch ($this->direction) {
                case self::DIRECTION_NORTH:
                    $this->position[1]++;
                    break;
                case self::DIRECTION_EAST:
                    $this->position[0]++;
                    break;
                case self::DIRECTION_SOUTH:
                    $this->position[1]--;
                    break;
                case self::DIRECTION_WEST:
                    $this->position[0]--;
                    break;
            }
            return $this;
        }
    
        public function instructions(string $inst): void {
            for ($i = 0; $i < strlen($inst); $i++) {
                switch ($inst[$i]) {
                    case 'R':
                        $this->turnRight();
                        break;
                    case 'L':
                        $this->turnLeft();
                        break;
                    case 'A':
                        $this->advance();
                        break;
                    default:
                        throw new InvalidArgumentException();
                        break;
                }
            }
        }
    }

?>
