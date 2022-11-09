<?php
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

    <title>Employee View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee View Details 
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
                                
                                    <div class="mb-3">
                                        <label>Employee Name</label>
                                        <p class="form-control">
                                            <?=$employee['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee Email</label>
                                        <p class="form-control">
                                            <?=$employee['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee Phone</label>
                                        <p class="form-control">
                                            <?=$employee['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Employee Details</label>
                                        <p class="form-control">
                                            <?=$employee['details'];?>
                                        </p>
                                    </div>

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