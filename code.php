<?php
include('dbcon.php');
session_start();

if(isset($_POST['save_student_btn'])){
    echo "hello world";
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

        
    $query = "INSERT INTO students (fullname,email,phone,course) VALUES (:fullname,:email,:phone,:course)";
    $query_run = $conn->prepare($query);

    $data = [
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':course' => $course
    ];
    $query_execute = $query_run->execute($data);
    if($query_execute){
        $_SESSION['message'] = "Insterted Successfully";
        header('Location: index.php');
        // exit(0);
    }else{
        $_SESSION['message'] = 'Not insterted Successfully';
        header('Location: index.php');
        // exit(0);
    }

}