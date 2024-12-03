<?php
require_once 'Employee.php'; // File chứa lớp Employee
require_once 'Manager.php';  // File chứa lớp Manager
require_once 'Contractor.php'; // File chứa lớp Contractor
require_once 'EmployeeManager.php'; // File chứa lớp EmployeeManager

// Khởi tạo EmployeeManager với file JSON
$manager = new EmployeeManager("employees.json");

// Tạo Manager mới
$manager1 = new Manager(1, "Alice", 40, 8000);
$manager1->addTeamMember(new Employee(2, "Bob", 30, 5000));
$manager1->addTeamMember(new Employee(3, "Charlie", 28, 4500));

// Thêm Manager vào hệ thống
$manager->addEmployee($manager1);

// Tạo Contractor mới
$contractor1 = new Contractor(4, "Diana", 35, "6 months", 50);
$manager->addEmployee($contractor1);

// Liệt kê toàn bộ nhân sự
echo "Danh sách nhân sự:\n";
$manager->listEmployees();

// Xóa nhân sự
$manager->removeEmployee(2);
echo "\nDanh sách sau khi xóa nhân sự ID 2:\n";
$manager->listEmployees();
?>
