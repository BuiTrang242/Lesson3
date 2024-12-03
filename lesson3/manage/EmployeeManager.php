<?php
class EmployeeManager {
    private $employees = [];
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
        $this->loadData();
    }

    public function addEmployee($employee) {
        $this->employees[] = $employee;
        $this->saveData();
    }

    public function removeEmployee($id) {
        $this->employees = array_filter($this->employees, function ($emp) use ($id) {
            return $emp->id !== $id;
        });
        $this->saveData();
    }

    public function listEmployees() {
        foreach ($this->employees as $emp) {
            echo "ID: {$emp->id}, Name: {$emp->name}\n";
        }
    }

    private function saveData() {
        $data = array_map(function ($emp) {
            return [
                'class' => get_class($emp),
                'data' => $emp->toArray()
            ];
        }, $this->employees);
        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    private function loadData() {
        if (!file_exists($this->filePath)) return;

        $data = json_decode(file_get_contents($this->filePath), true);
        foreach ($data as $item) {
            $class = $item['class'];
            $this->employees[] = $class::fromArray($item['data']);
        }
    }
}
?>
