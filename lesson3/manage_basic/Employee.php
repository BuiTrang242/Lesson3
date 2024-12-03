<?php
// Khai báo lớp Employee kế thừa từ Person
class Employee extends Person
{
    private $jobPosition;
    protected $salary;

    public function __construct($firstName, $lastName, $dateOfBirth, $address, $jobPosition, $salary)
    {
        parent::__construct($firstName, $lastName, $dateOfBirth, $address);
        $this->jobPosition = $jobPosition;
        $this->salary = $salary;
    }

    public function getJobPosition()
    {
        return $this->jobPosition;
    }

    public function setJobPosition($jobPosition)
    {
        $this->jobPosition = $jobPosition;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    // Ghi đè phương thức toArray
    public function toArray()
    {
        return [
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'dateOfBirth' => $this->getDateOfBirth(),
            'address' => $this->getAddress(),
            'jobPosition' => $this->getJobPosition(),
            'salary' => $this->getSalary()
        ];
    }

    public static function fromArray($array)
    {
        return new Employee(
            $array['firstName'],
            $array['lastName'],
            $array['dateOfBirth'],
            $array['address'],
            $array['jobPosition'],
            $array['salary']
        );
    }
}

?>