<?php
include 'connection.php';
// session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payroll-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .animate-fade-in {
            animation: fadeIn 1s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            font-weight: bold;
        }

        select,
        input,
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Payroll <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
    <a class="nav-link" href="fteam.php">
        <i class="fas fa-users"></i>
        <span>Employees Section</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="fsalary.html">
        <i class="fas fa-file-invoice-dollar"></i>

        <span>Salary Slips</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="fpayhead.php">
        <i class="fas fa-money-bill-wave"></i>

        <span>Pay Head</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="fmanage.php">
        <i class="fas fa-hand-holding-usd"></i>

        <span>Manage Salary</span></a>
</li>
<li class="nav-item active">
      <a class="nav-link" href="empProfile.php"> 
         <i class="fas fa-user-plus"></i> 
        <span>Add Employee</span>
</a>
</li>

        </ul>

        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Finance Team</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Page content goes here -->
                <div class="container-fluid">
                    <div class="animate-fade-in">
                        <h1 class="h3 mb-4 text-gray-800">Employee Salary</h1>
                        <div class="salary-form">
                        <?php
                                $emp_id = $_GET['id'];
                                $query = "SELECT * FROM employee WHERE employee_id ='$emp_id'";
                                $result = mysqli_query($conn, $query);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $employee = mysqli_fetch_assoc($result);
                                    ?>
       
                            <form method="post" action="fmanageSalary.php">
                                <div class="form-group">
                                    <label for="employeeId">Employee ID</label>
                                    <input type="text" class="form-control" id="employeeId" name="employeeId" value="<?= $employee['employee_id']; ?>"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="employeeName">Employee Name</label>
                                    <input type="text" class="form-control" id="employeeName" name="employeeName"value="<?= $employee['last_name']; ?>"readonly>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
    
                                    <div class="form-group">
                                        <select class="form-control" id="designation" placeholder="Designation" name="designation"readonly>
                                            <option value="IT Coordinator" <?php if ($employee['designation'] === 'IT Coordinator') echo 'selected'; ?>>IT Coordinator</option>
                                            <option value="Computer Programmer" <?php if ($employee['designation'] === 'Computer Programmer') echo 'selected'; ?>>Computer Programmer</option>
                                            <option value="Data Analyst" <?php if ($employee['designation'] === 'Data Analyst') echo 'selected'; ?>>Data Analyst</option>
                                            <option value="Application Analyst" <?php if ($employee['designation'] === 'Application Analyst') echo 'selected'; ?>>Application Analyst</option>
                                        </select>
                                    </div>
                    
                                </div>
                                <div class="form-group">
                                                                       
                                  <?php
                                       $query = "SELECT * FROM package WHERE designation = '{$employee['designation']}'";
                                       $result = mysqli_query($conn, $query);
                                       if ($result && mysqli_num_rows($result) > 0) {
                                           $package = mysqli_fetch_assoc($result);
                                       ?>
                                       <div class="form-group">
                                           <label for="overtime">Salary</label>
                                           <input type="text" class="form-control" id="salary" name="salary" value="<?= $package['CTC']; ?>" readonly>
                                       </div>
                                       <?php
                                       } else {
                                       ?>
                                           <!-- Handle the case where there is no matching package -->
                                           <div class="form-group">
                                               <label for="overtime">Salary</label>
                                               <input type="text" class="form-control" id="salary" name="salary" value="No package found" readonly>
                                           </div>
                                       <?php
                                       }
                                       ?>

                                <div class="form-group">
                                    <label for="overtime">Overtime</label>
                                    <input type="text" class="form-control" id="overtime" name="overtime">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Employee Pay Head</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="basicPay">
                                        <label class="form-check-label" for="basicPay">Basic Pay</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="bonus">
                                        <label class="form-check-label" for="bonus">Bonus</label>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label>Employee Pay Head</label>

                                    <?php
                                  // Assuming you have an established database connection ($conn)

                                      // Retrieve the checkbox values from the database
                                         $sql = "SELECT * FROM payhead";
                                         $result = $conn->query($sql);
                                         if ($result->num_rows > 0) {
                                            //  while ($row = $result->fetch_assoc()) {
                                            //      $payheadId = $row['payhead_id'];
                                            //      $payheadName = $row['payhead_name'];
                                            //      $payheadAmount = $row['payhead_amount'];
                                            //      $payheadType = $row['payhead_type'];

       

                                            //      // Generate the HTML for the checkbox input with name attribute
                                            //      echo '<div class="form-check">';
                                            //      echo '<input type="text" name="payhead[]" value="'.$payheadAmount.'">';
                                            //      echo '<input type="text" name="master[]" value="'.$payheadId.'" >';
                                     
                                            //      // echo '<input class="form-check-input" type="checkbox" id="' . $payheadId . '" name="payhead[]" value="'.$payheadId.'">';
                                            //      echo '<label class="form-check-label" for="' . $payheadId . '">' . $payheadName . '</label>';
                                            //      echo '</div>';
                                            //  }
                                            while ($row = $result->fetch_assoc()) {
                                                $payheadId = $row['payhead_id'];
                                                $payheadName = $row['payhead_name'];
                                                $payheadAmount = $row['payhead_amount'];
                                                $payheadType = $row['payhead_type'];

                                                // Generate the HTML for the checkbox input with name attribute
                                                echo '<div class="form-check">';
                                                echo '<label class="form-check-label" for="' . $payheadId . '">' . $payheadName . '</label>';
                                                echo '<br>';
                                                echo '<input type="text" name="payhead[]" value="'.$payheadAmount.'">';
                                                echo '<input type="hidden" name="master[]" value="'.$payheadId.'" >';
                                    
                                                // echo '<input class="form-check-input" type="checkbox" id="' . $payheadId . '" name="payhead[]" value="'.$payheadId.'">';
                                               //  echo '<label class="form-check-label" for="' . $payheadId . '">' . $payheadName . '</label>';
                                                echo '</div>';
                                            }
                                         ?>
                                </div>

                                <div class="form-group">
                                    <label for="salaryMonth">Salary Month</label>
                                    <select class="form-control" id="salaryMonth" name="salaryMonth">
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="salaryYear">Salary Year</label>
                                    <input type="text" class="form-control" id="salaryYear">
                                </div> -->
                                <div class="form-group">
                                    <label for="salaryYear">Salary Year</label>
                                    <select class="form-control" id="salaryYear" name="salaryYear">
                                        <?php
                                        // Get the current year and a few years in the past and future
                                        $currentYear = date("Y");
                                        $yearsInPast = $currentYear - 5;
                                        $yearsInFuture = $currentYear + 5;

                                        // Generate options for a range of years
                                        for ($year = $yearsInPast; $year <= $yearsInFuture; $year++) {
                                            echo "<option value='$year'>$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Add<i class="fas fa-plus"></i></button>
                            </form>
                            <?php
                                  } else {
                                  }
                                      ?>
                                      
                                      <h1>No record found</h1>
                                      <?php
                                  }
                                  ?>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Payroll Management System</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout                                     .php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>