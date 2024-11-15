<?php

class EmployeeManager
{
    private $employees = [];

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function displayEmployeeList()
    {
        foreach ($this->employees as $index => $employee) {
            echo ($index + 1) . ". " . $employee->getFirstName() . " " . $employee->getLastName() . " - " . $employee->getJobPosition() . PHP_EOL;
        }
    }

    public function getEmployeeDetails($index)
    {
        if (isset($this->employees[$index])) {
            $employee = $this->employees[$index];
            print_r($employee->toArray());
        } else {
            echo "Nhân sự không tồn tại." . PHP_EOL;
        }


    }

    public function saveToFile($filename)
    {


        $data = [];
        foreach ($this->employees as $employee) {
            $data[] = $employee->toArray();
        }
        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

    }

    public function loadFromFile($filename)
    {


        if (file_exists($filename)) {
            $data = json_decode(file_get_contents($filename), true);
            foreach ($data as $employeeData) {
                $this->employees[] = Employee::fromArray($employeeData);
            }
        }
    }
}

?>