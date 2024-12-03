<?php
class Person {
    public $id;
    public $name;
    public $age;

    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public static function fromArray($data) {
        return new self($data['id'], $data['name'], $data['age']);
    }
}
?>
