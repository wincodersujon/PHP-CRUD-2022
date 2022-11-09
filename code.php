<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['delete_employee']);

    $query = "DELETE FROM employees WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "employee Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "employee Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $details = mysqli_real_escape_string($con, $_POST['details']);

    $query = "UPDATE employees SET name='$name', email='$email', phone='$phone', details='$details' WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "employee Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "employee Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_employee']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $details = mysqli_real_escape_string($con, $_POST['details']);

    $query = "INSERT INTO employees (name,email,phone,details) VALUES ('$name','$email','$phone','$details')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "employee Created Successfully";
        header("Location: employee-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "employee Not Created";
        header("Location: employee-create.php");
        exit(0);
    }
}

?>