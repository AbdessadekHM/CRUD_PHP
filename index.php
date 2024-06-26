<?php 
include('dbcon.php');
session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP_CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if(isset($_SESSION['message'])):?>
                <h5 class='alert alert-success'>
                    <?=  $_SESSION['message'] ?>
                </h5>
                <?php 
                unset($_SESSION['message']);
                endif?>

                <div class="card">
                    <div class="card-header">
                        <h3>
                            PHP PDO CRUD
                            <a href="student-add.php" class="btn btn-primary float-end">Add Student</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = 'SELECT * FROM students';
                                $statement = $conn->prepare($query);
                                $statement->execute();
                                $statement->setFetchMode(PDO::FETCH_OBJ);
                                $result = $statement->fetchAll();//PDO::FETCH_ASSOC
                                if($result){
                                    foreach ($result as $row) {?>
                                <tr>
                                    <td><?=$row->id?></td>
                                    <td><?=$row->fullname?></td>
                                    <td><?=$row->email?></td>
                                    <td><?=$row->phone?></td>
                                    <td><?=$row->course?></td>
                                    <td>
                                        <a href="student-edit.php?id=<?= $row->id ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="id" value="<?=$row->id ?>">
                                            <button type="submit" name="delete_student_btn" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    ?>
                                <?php
                                }else{
                                ?>
                                <td colspan=5>NOT FOUND</td>
                                <?php 
                            }
                                ?>
                            </tbody>
                        </table>
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