<?php

// Khai báo lớp Person
class Person
{
    private $firstName;
    private $lastName;
    private $dateOfBirth;
    private $address;

    public function __construct($firstName, $lastName, $dateOfBirth, $address)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->address = $address;
    }

    // Getter và Setter cho các thuộc tính
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    //Phương thức toArray để chuyển đổi đối tượng thành mảng
    public function toArray()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'dateOfBirth' => $this->dateOfBirth,
            'address' => $this->address
        ];
    }

    //Phương thức fromArray để khởi tạo đối tượng từ mảng
    public static function fromArray($array)
    {
        return new Person($array['firstName'], $array['lastName'], $array['dateOfBirth'], $array['address']);
    }
}
?>