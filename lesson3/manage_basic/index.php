<?php
require 'Person.php';
require 'Employee.php';
require 'EmployeeManager.php';


$manager = new EmployeeManager();
$manager->addEmployee(new Employee("Trang", "Nguyen", "1990-01-01", "123 Main St", "Developer", 1500));
$manager->addEmployee(new Employee("Hai", "Le", "1992-03-12", "456 Elm St", "Designer", 1300));
$manager->displayEmployeeList();
$manager->saveToFile("employees.json");
$manager->loadFromFile("employees.json");
$manager->getEmployeeDetails(0);
?>