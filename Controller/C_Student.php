<?php
include_once("../Model/M_Student.php");
class Ctrl_Student
{
    public function invoke()
    {
        if (isset($_GET['stid'])) {
            $modelStudent = new Model_Student();
            $student = $modelStudent->getStudentDetail($_GET['stid']);
            include_once("../View/StudentDetail.html");
        } 
        if (isset($_GET['updateid'])) {
            $modelStudent = new Model_Student();
            $student = $modelStudent->getStudentDetail($_GET['updateid']);
            include_once("../View/UpdateStudent.html");
        } 
        if (isset($_GET['deleteid'])) {
            $modelStudent = new Model_Student();
            $student = $modelStudent->deleteStudent($_GET['deleteid']);
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentListDelete.html");
        } 
        else if (isset($_GET['mod1'])) {
            include_once("../View/insertStudent.html");
            
        } 
        else if (isset($_GET['mod2'])) {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentListUpdate.html");
        } 
        else if (isset($_GET['mod3'])) {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentListDelete.html");
        } 
        else if (isset($_GET['mod4'])) {
            include_once("../View/SearchStudent.html");
        } 
        else if (isset($_POST['update'])) {
           $id= $_REQUEST['id'];
           $name= $_REQUEST['name'];
           $age= $_REQUEST['age'];
           $university= $_REQUEST['university'];
            $modelStudent = new Model_Student();
            $modelStudent->updateStudent($id,$name,$age,$university);
            header("Location:C_Student.php");
        } 
        else if (isset($_POST['insert'])) {
           $id= $_REQUEST['id'];
           $name= $_REQUEST['name'];
           $age= $_REQUEST['age'];
           $university= $_REQUEST['university'];
            $modelStudent = new Model_Student();
            $modelStudent->insertStudent($id,$name,$age,$university);
            header("Location:C_Student.php");
        } 
        else if (isset($_POST['search'])) {
           $id= $_REQUEST['id'];
           $name= $_REQUEST['name'];
           $age= $_REQUEST['age'];
           $university= $_REQUEST['university'];
           $modelStudent = new Model_Student();
           $studentList = $modelStudent->searchStudent($id,$name,$age,$university);
           include_once("../View/StudentList.html");
        } 
        else {
            $modelStudent = new Model_Student();
            $studentList = $modelStudent->getAllStudent();
            include_once("../View/StudentList.html");
        }   

    }
};
$C_Student = new Ctrl_Student();
$C_Student->invoke();
