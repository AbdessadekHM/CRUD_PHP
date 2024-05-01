<?php
include('dbcon.php');


if(isset($_POST['delete_student_btn'])){
    echo 'clicked';
    $id = $_POST['id'];
    $query = "DELETE FROM students WHERE id=:id";
    $query_run = $conn->prepare($query);
    $data = [
        ':id' =>$id
    ];
    $query_execute = $query_run->execute($data);
    if($query_execute){
        $_SESSION['message'] = "Deleted Successfully";
        header('Location: index.php');
        exit(0);
        echo $old_id;
    }else{
        $_SESSION['message'] = 'Not Deleted Successfully';
        header('Location: index.php');
        exit(0);
    }

}   