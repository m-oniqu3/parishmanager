<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">-->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="http://localhost/roadnet/css/parishstyles.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand col-4 col-lg-1"> <img src="http://localhost/roadnet/images/logo.png" class="img-fluid">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Roadnet </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Generate Report </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Broadcast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Priortize</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="widebox mx-auto p-4 mt-4 mb-5">
        <p class="h1 ml-3 mt-3 text-white">View Reports</p>
        <p class="lead mt-3 ml-3 text-white">View submitted incident reports in a particular location in your parish. Search for the report by its address or its town. </p>
    </div>

    <!--<div class="container mt-4">
        <form>
            <div class="form-row p-2">
                <div class="form-group col-md-6">
                    <label class="h6 text-success" for="location">Location</label>
                    <div class="">
                        <select name="location" id="location" class="form-control" required>

                            <option disabled selected value> -- Choose Location By -- </option>
                            <option value="Address">Address</option>
                            <option value="Town">Town</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="h6 text-success" for="search">Search For</label>
                    <input type="text" class="form-control" id="search" name="search" required>
                </div>

                <div class="p-2 col-12">
                    <div class="text-right">
                      <button type="submit" class="btn text-white c">Search</button>
                      
                    </div>
                </div>
            </div>
        </form>
    </div>-->

    <div class="container-fluid  ">
        <div class="row p-2">



            <?php
            // Include config file
            require_once "config.php";

            // Attempt select query execution
            $sql = "SELECT * FROM report";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<table id="myTable" class="table c table-bordered text-center table-sm table-responsive">';
                    echo '<thead>';
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>First Name</th>";
                    echo "<th>Last Name</th>";
                    echo "<th>Phone</th>";
                    echo "<th>Parish</th>";
                    echo "<th>Town</th>";
                    echo "<th>GPS Coordinates</th>";
                    echo "<th>Address</th>";
                    echo "<th>Direction</th>";
                    echo "<th>Type</th>";
                    echo "<th>Description</th>";
                    echo "<th>Status</th>";
                    echo "<th>Date</th>";
                    echo "<th>Priority</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['reportID'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['telephone'] . "</td>";
                        echo "<td>" . $row['parish'] . "</td>";
                        echo "<td>" . $row['town'] . "</td>";
                        echo "<td>" . $row['gpscoord'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['direction'] . "</td>";
                        echo "<td>" . $row['incident'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['vstatus'] . "</td>";
                        echo "<td>" . $row['rdate'] . "</td>";
                        echo "<td>" . $row['priority'] . "</td>";
                        //echo "<td>" . $row['role'] . "</td>";

                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo '<div class="alert alert-danger"><em>No reports were found.</em></div>';
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
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>

</html>