<?php
    //values for example
    declare(strict_types=1);
    class HighScores
    {
        public $scores;
        public $personalBest;
        public $latest;
        public $personalTopThree;

        public function __construct(array $scores)
        {       
            $this->scores = $scores;
            $this->processOperations();
        }

        public function processOperations(): void{
            $this->latest = end($this->scores);
            $sortedScores = $this->scores;
            rsort($sortedScores);
            $this->personalBest = $sortedScores[0];
            $this->personalTopThree = array_slice($sortedScores, 0, 3);
        }
    
    }
?>
