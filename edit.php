<?php
include('dbcon.php');
session_start();

if(isset($_POST['edit_student_btn'])){
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $old_id = preg_replace('/[^0-9]/', '', $_SESSION['id']);  ;
    $query = "UPDATE students SET id=:id,fullname=:fullname,email=:email,phone=:phone,course=:course WHERE id=:old_id";
    $query_run = $conn->prepare($query);
    $data = [
        ':id' =>$id,
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':course' => $course,
        ':old_id' => $old_id
    ];
    $query_execute = $query_run->execute($data);
    if($query_execute){
        $_SESSION['message'] = "Updtated Successfully";
        header('Location: index.php');
        exit(0);
        echo $old_id;
    }else{
        $_SESSION['message'] = 'Not Updtated Successfully';
        header('Location: index.php');
        exit(0);
    }

}   