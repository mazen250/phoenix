<?php include('server.php');
if(!isset($_SESSION['success'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/new.css">
</head>
<body>
    <!-- sidebar -->
    <div class="outer">
    <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header" style="text-align: center;">
                    <img src="images/phoenixacademy.png" height="35" alt="">
                </div>

                <ul class="list-unstyled components">
                    <!-- <li>
                        <a href="center.php">Centers</a>
                    </li> -->
                    <li>
                        <a href="course.php">Courses</a>
                    </li>
                    <!-- <li>
                        <a href="instruct.php">Instructors</a>
                    </li> -->
                    <li>
                        <a href="cert.php">Certificates</a>
                    </li>
                    <!-- <li>
                        <a href="cambridge.php">Cambridge</a>
                    </li>
                    <li>
                        <a href="cambridge.php">Phoenix</a>
                    </li>
                    <li>
                        <a href="faq.php">FAQs</a>
                    </li> -->
                </ul>
            </nav>
    </div>
    <!-- end sidebar -->
    <!-- content -->
    <div class="welcome">
        <h1>Welcome, <?php echo($_SESSION['success']) ?></h1>
        <p>What would you like to do?</p>
        <div class="options">
            <!-- <a href="center.php"><button class="btn btn-lg btn-danger">Centers</button></a> -->
            <a href="course.php"><button class="btn btn-lg btn-danger">Courses</button></a>
            <!-- <a href="instruct.php"><button class="btn btn-lg btn-danger">Instructors</button></a> -->
            <a href="cert.php"><button class="btn btn-lg btn-danger">Certificates</button></a>
        </div>
            <!-- <a href="faq.php"><button class="btn btn-lg btn-danger">FAQs</button></a> -->
        </div>
    </div>
</div>
</body>
</html>