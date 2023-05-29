<?php
    //values for example
    declare(strict_types=1);

    class Series
    {
        private string $series;
    
        public function __construct(string $value)
        {
            $this->series = $value;
        }
    
        public function largestProduct(int $span): int
        {
            $seriesLength = strlen($this->series);
    
            if ($span > $seriesLength || $span < 0) {
                throw new InvalidArgumentException("the span must be less than series");
            }
    
            if (!ctype_digit($this->series)) {
                throw new InvalidArgumentException("the data must be a number");
            }
    
            $maxInSeries = $seriesLength - $span + 1;
            $result = 0;
    
            for ($i = 0; $i < $maxInSeries; $i++) {
                $product = array_product(str_split(substr($this->series, $i, $span)));
                $result = max($product, $result);
            }
    
            return $result;
        }
    }
?>
