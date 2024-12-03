<?php
require_once 'Person.php';

class Contractor extends Person {
    public $contractPeriod;
    private $hourlyRate;

    public function __construct($id, $name, $age, $contractPeriod, $hourlyRate) {
        parent::__construct($id, $name, $age);
        $this->contractPeriod = $contractPeriod;
        $this->hourlyRate = $hourlyRate;
    }

    public function getHourlyRate() {
        return $this->hourlyRate;
    }

    public function setHourlyRate($rate) {
        $this->hourlyRate = $rate;
    }

    public function toArray() {
        $data = parent::toArray();
        $data['contractPeriod'] = $this->contractPeriod;
        $data['hourlyRate'] = $this->hourlyRate;
        return $data;
    }

    public static function fromArray($data) {
        return new self($data['id'], $data['name'], $data['age'], $data['contractPeriod'], $data['hourlyRate']);
    }
}
?>
