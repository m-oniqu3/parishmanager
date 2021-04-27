<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Administrator's Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <nav class="nav bg-light p-2 m-1 navbar-expand-lg navbar-light">
        <button id="button" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="row navbar-collapse collapse" id="navbar">

            <div class="col-6 p-2  offset-3 offset-lg-0 col-lg-2 order-1 order-lg-2">
                <img src="images\logo.png" class="img-fluid">
            </div>

            <div class="navbar-nav p-2  col-12 col-lg-5 d-flex order-lg-1 order-2">
                <a href="#" class="nav-link text-center">Home</a>
                <a href="#" class="nav-link text-center">Report</a>
                <a href="#" class="nav-link text-center">Update</a>
            </div>


            <div class="navbar-nav p-2 col-12   col-lg-5 d-flex justify-content-end order-3">
                <a href="#" class="nav-link text-center">About</a>
                <a href="#" class="nav-link text-center">Contact</a>
                <a href="#" class="nav-link text-center">Admin</a>
            </div>
        </div>

    </nav>

    <div class="container-fluid col-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-md-12">
                <div class=" mb-3 list-inline">
                    <h2 class="list-inline-item text-success">Incident Reports</h2>
                    <a href="pmviewreport.php" class="btn btn-success list-inline-item pull-right"><i class="text-white fa fa-eye"></i> View Reports</a>
                </div>
                <p class="lead">See all incident reports in your parish below. </p>
                <?php
                // Include config file
                require_once "config.php";

                // Attempt select query execution
                $sql = "SELECT * FROM report";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table id="myTable" class="col-12 col-md-12 col-lg-12 col-xl-12 table text-center  table-bordered table-striped">';
                        echo '<thead class="bg-warning" >';
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Parish</th>";
                        echo "<th>Town</th>";
                        echo "<th>GPS Coordinates</th>";
                        echo "<th>Address</th>";
                        echo "<th>Type</th>";
                        echo "<th>Description</th>";
                        echo "<th>Status</th>";
                        echo "<th>Date</th>";
                        echo "<th>Priority</th>";
                        echo "<th>Actions</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['reportID'] . "</td>";
                            echo "<td>" . $row['parish'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['gpscoord'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['incident'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['vstatus'] . "</td>";
                            echo "<td>" . $row['rdate'] . "</td>";
                            echo "<td>" . $row['priority'] . "</td>";
                            echo '<td>';

                            echo '<a href="priority.php?id=' . $row['reportID'] . '" class=" mx-auto  btn btn-warning" >Update</a>';
                           
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else {
                        echo '<div class="alert alert-danger"><em>No employee records were found.</em></div>';
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
    
</body>

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>