<?php
include_once("E_Student.php");
class Model_Student
{
    public function __construct() {}
    public function getAllStudent()
    {
        $link = mysqli_connect('localhost','root','') or die('could not connect: ');
        $db_selected = mysqli_select_db($link, 'dulieu');
        $rs = mysqli_query($link, "SELECT * FROM sinhvien");
        $i = 0;
        while ($row = mysqli_fetch_array($rs)) {
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $university = $row['university'];
            while ($i != $id) $i++;
            $student[$i++] = new Entity_Student($id, $name, $age, $university);
        }
        return $student;
    }
    public function getStudentDetail($stid)
    {
        $allStudent = $this->getAllStudent();
        return $allStudent[$stid];
    }

    public function insertStudent($id,$name,$age,$university)
    {
       $link = mysqli_connect("localhost","root","")or die("Khong the ket noi MySQL");
       mysqli_select_db($link, "dulieu");
       $sql = "insert into sinhvien (`id`, `name`, `age`, `university`) value ($id,'$name','$age','$university')";
       $rs = mysqli_query($link, $sql);
        mysqli_close($link);
    }
    public function updateStudent($id,$name,$age,$university)
    {
       $link = mysqli_connect("localhost","root","")or die("Khong the ket noi MySQL");
       mysqli_select_db($link, "dulieu");
       $sql = "UPDATE `sinhvien` SET `id` = '$id', `name` = '$name', `age` = '$age', `university` = '$university' WHERE `sinhvien`.`id` = '$id'";
       $rs = mysqli_query($link, $sql);
        mysqli_close($link);
    }
    public function searchStudent($id, $name, $age, $university)
    {
        $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi MySQL");
        mysqli_select_db($link, "dulieu");
        $sql = "SELECT * FROM `sinhvien` WHERE id='$id' OR name='$name' OR age='$age' OR university='$university'";
        $rs = mysqli_query($link, $sql);
        $student = array(); // Khởi tạo mảng sinh viên
        if (mysqli_num_rows($rs) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_array($rs)) {
                $id = $row['id'];
                $name = $row['name'];
                $age = $row['age'];
                $university = $row['university'];
                while ($i != $id) $i++;
                $student[$i++] = new Entity_Student($id, $name, $age, $university);
            }
        } else {
            echo "Không tìm thấy sinh viên.";
        }
        mysqli_close($link);
        return $student;
    }
    
    public function deleteStudent($deleteid)
    {
        $link = mysqli_connect("localhost","root","")or die("Khong the ket noi MySQL");
        mysqli_select_db($link, "dulieu");
        $sql = "DELETE FROM sinhvien WHERE `sinhvien`.`id` = '$deleteid'";
        $rs = mysqli_query($link, $sql);
         mysqli_close($link);
    }
}
?>x