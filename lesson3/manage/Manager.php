<?php
require_once 'Employee.php';

class Manager extends Employee {
    public $team = [];

    public function addTeamMember(Employee $employee) {
        $this->team[] = $employee;
    }

    public function removeTeamMember($employeeId) {
        $this->team = array_filter($this->team, function ($member) use ($employeeId) {
            return $member->id !== $employeeId;
        });
    }

    public function displayTeam() {
        foreach ($this->team as $member) {
            echo "ID: {$member->id}, Name: {$member->name}\n";
        }
    }

    public function toArray() {
        $data = parent::toArray();
        $data['team'] = array_map(function ($member) {
            return $member->toArray();
        }, $this->team);
        return $data;
    }

    public static function fromArray($data) {
        $manager = new self($data['id'], $data['name'], $data['age'], $data['salary']);
        foreach ($data['team'] as $memberData) {
            $manager->addTeamMember(Employee::fromArray($memberData));
        }
        return $manager;
    }
}
?>
