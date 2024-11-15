<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Xây dựng lớp StopWatch</title>
</head>

<body>
    <?php
    class StopWatch
    {
        private $startTime;
        private $endTime;


        public function __construct()
        {
            $this->startTime = microtime(true);
        }


        public function start()
        {
            $this->startTime = microtime(true);
        }


        public function stop()
        {
            $this->endTime = microtime(true);
        }


        public function getStartTime()
        {
            return $this->startTime;
        }


        public function getEndTime()
        {
            return $this->endTime;
        }


        public function getElapsedTime()
        {
            return ($this->endTime - $this->startTime) * 1000;
        }
    }
    ?>
    <?php

    $array = [];
    for ($i = 0; $i < 100000; $i++) {
        $array[] = rand(1, 1000000);
    }


    $stopWatch = new StopWatch();


    $stopWatch->start();


    for ($i = 0; $i < count($array) - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }

        $temp = $array[$i];
        $array[$i] = $array[$minIndex];
        $array[$minIndex] = $temp;
    }


    $stopWatch->stop();


    echo "Time taken to sort 100,000 numbers using selection sort: " . $stopWatch->getElapsedTime() . " milliseconds\n";
    ?>

</body>

</html>