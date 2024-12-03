<?php
class Employee {
    public $id;
    public $name;
    public $age;
    public $salary;

    public function __construct($id, $name, $age, $salary) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self($data['id'], $data['name'], $data['age'], $data['salary']);
    }
}
?>
