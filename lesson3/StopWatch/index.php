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

        // Constructor không tham số khởi tạo startTime
        public function __construct()
        {
            $this->startTime = microtime(true);
        }

        // Phương thức start để thiết lập startTime
        public function start()
        {
            $this->startTime = microtime(true);
        }

        // Phương thức stop để thiết lập endTime
        public function stop()
        {
            $this->endTime = microtime(true);
        }

        // Getter cho startTime
        public function getStartTime()
        {
            return $this->startTime;
        }

        // Getter cho endTime
        public function getEndTime()
        {
            return $this->endTime;
        }

        // Phương thức trả về thời gian đã trôi qua
        public function getElapsedTime()
        {
            return ($this->endTime - $this->startTime) * 1000; // Chuyển từ giây sang millisecond
        }
    }
    ?>
    <?php
    // Tạo một mảng với 100,000 phần tử ngẫu nhiên
    $array = [];
    for ($i = 0; $i < 100000; $i++) {
        $array[] = rand(1, 1000000);
    }

    // Tạo đối tượng StopWatch
    $stopWatch = new StopWatch();

    // Bắt đầu đo thời gian
    $stopWatch->start();

    // Thuật toán sắp xếp chọn (selection sort)
    for ($i = 0; $i < count($array) - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }
        // Hoán đổi phần tử
        $temp = $array[$i];
        $array[$i] = $array[$minIndex];
        $array[$minIndex] = $temp;
    }

    // Dừng đo thời gian
    $stopWatch->stop();

    // Hiển thị thời gian thực thi
    echo "Time taken to sort 100,000 numbers using selection sort: " . $stopWatch->getElapsedTime() . " milliseconds\n";
    ?>

</body>

</html>