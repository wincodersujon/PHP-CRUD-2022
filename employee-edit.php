<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Employee Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM employees WHERE id='$employee_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $employee = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="employee_id" value="<?= $employee['id']; ?>">

                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <input type="text" name="name" value="<?=$employee['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee Email</label>
                                        <input type="email" name="email" value="<?=$employee['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee Phone</label>
                                        <input type="text" name="phone" value="<?=$employee['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee Details</label>
                                        <input type="text" name="details" value="<?=$employee['details'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_employee" class="btn btn-primary">
                                            Update Employee
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>