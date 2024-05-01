<?php 
include('dbcon.php');
session_start();
$id = $_SERVER['QUERY_STRING'];
$_SESSION['id'] = $id;
$query = "SELECT * FROM students WHERE $id";
$statement = $conn->prepare($query);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$result = $statement->fetchAll();
$result = $result[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert data into database using php pdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            PHP PDO CRUD
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="edit.php" method="post">
                            <div class="mb-3">
                                <label for="">ID</label>
                                <input value="<?=$result->id?>" type="text" name="id" class='form-control'>
                            </div>
                            <div class="mb-3">
                                <label for="">Full Name</label>
                                <input value="<?=$result->fullname?>" type="text" name="fullname" class='form-control'>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input value="<?=$result->email?>" type="email" name="email" class='form-control'>
                            </div>
                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input value="<?=$result->phone?>" type="text" name="phone" class='form-control'>
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <input value="<?=$result->course?>" type="text" name="course" class='form-control'>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_student_btn" class="btn btn-primary">Save
                                    Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>