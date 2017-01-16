<?php
session_start();
$role = $_SESSION['sess_userrole'];
if(!isset($_SESSION['sess_username'])){
    header('Location: home-page.php?err=2');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/chess/Knight.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>IPFW Chess Club - User Management</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
</head>

<body>

<!-- Navbar will come here -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">IPFW Chess Club</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="home-page.php">Home</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="rankings.php">Rankings</a></li>
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">Profile</a></li>
                        <li class="active"><a href="user-management.php">User Management</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- end navbar -->

<div class="wrapper">
    <!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
    <div class="main-raised" style="background-color: white">
        <div class="container" style="padding-top: 50px">

            <?php
            require_once('database-config.php');
            $q = 'SELECT first,last,email,phone,password,division,score,type FROM members 
                    ORDER BY division ASC';
            $stmt = $dbh->query($q);
            ?>

            <!-- here you can add your content -->
            <div class="rTable">
                <div class="rTableRow">
                    <div class="rTableHead"><strong>First Name</strong></div>
                    <div class="rTableHead"><strong>Last Name</strong></div>
                    <div class="rTableHead"><strong>Email</strong></div>
                    <div class="rTableHead"><strong>Phone#</strong></div>
                    <div class="rTableHead"><strong>Password</strong></div>
                    <div class="rTableHead"><strong>Division</strong></div>
                    <div class="rTableHead"><strong>Score</strong></div>
                    <div class="rTableHead"><strong>Is Official</strong></div>
                    <div class="rTableHead"><strong>Delete</strong></div>
                </div>
                <?php
                foreach ($stmt as $row) {
                    echo "<div class=\"rTableRow\">";
                    echo "  <div class=\"rTableCell\">{$row['first']}</div>";
                    echo "  <div class=\"rTableCell\">{$row['last']}</div>";
                    echo "  <div class=\"rTableCell\">{$row['email']}</div>";
                    echo "  <div class=\"rTableCell\">{$row['phone']}</div>";
                    echo "  <div class=\"rTableCell\">{$row['password']}</div>";
                    echo "  <div class=\"rTableCell\">{$row['division']}</div>";
                    echo "  <div class=\"rTableCell\">{$row['score']}</div>"; ?>
                    <input type="radio"
                    <?php if ($type > 2) echo "checked";?> value="yes">Yes
                    <input type="radio"
                    <?php if ($type < 2) echo "checked";?> value="no">No
                <?php
                    echo "  <div class=\"rTableCell\">{$row['type']}</div>";
                    echo "</div>";
                }
                ?>
            </div>
            <a href="#" class="btn btn-primary btn-lg">Update</a>
        </div>
    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="assets/js/material-kit.js" type="text/javascript"></script>

</html>