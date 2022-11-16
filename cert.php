<?php
if (isset($_GET['ID'])) {
    // get certificates
    $id = $_GET['ID'];
    $myDB = mysqli_connect('localhost', 'root', '', 'am-phoenix');
    $sql = "SELECT * FROM phoenix_cert WHERE ID='$id'";
    $result = mysqli_query($myDB, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $found = count($arr) > 0 ? TRUE : FALSE;
} else {
    $found = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phoenix Academy</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500;600&display=swap" rel="stylesheet" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <style>
        .details {
            display: flex;
            background: #fdf8f8;
        }

        .row {
            font-family: 'HelveticaNeueCyr-Medium';
            line-height: 28px;
            font-size: large;
            padding-bottom: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .details .contant {
            margin: 0 auto;
            padding: 0;
        }

        .info img {
            height: 570px;
            max-width: 100%;
        }

        .certImage {
            position: relative;
            text-align: center;
        }

        .top {
            position: absolute;
            top: 140px;
            left: 62px;
            font-weight: bold;
            font-size: large;
            width: 290px;
        }

        .top .var {
            color: #4F81BD;
            font-family: Algerian;
            color: #C00000;
            max-width: 270px;
            width: 100%;
        }

        .top .constant {
            font-family: 'Arial Rounded MT Bold';
            color: black;
            font-size: medium;
        }

        .top .gr {
            margin-top: 10px;
        }

        .top .par {
            font-size: 12px;
        }

        .date {
            font-family: Rockwell;
        }

        .left-bottom {
            margin-top: 30px;
            font-family: 'Arial Rounded MT Bold';
            font-size: 9px;
            position: relative;
            left: -50px;
        }

        .left-bottom span {
            color: #C00000;
        }

        @media(max-width:767px) {
            .certImage {
                margin: 0 auto;
                width: fit-content;
            }
        }

        @media(max-width:374px) {
            .top {
                left: 35px;
            }
        }

        @media(max-width:349px) {
            .top {
                left: 25px;
            }
        }

        @media(max-width:333px) {
            .top {
                left: 15px;
                top: 170px;
            }

            .top .var {
                font-size: medium;
            }

            .top .constant {
                font-size: x-small;
            }

            .left-bottom {
                font-size: 8px;
            }
        }

        @media(max-width:280px) {
            .top {
                left: -6px;
            }
        }

        .title {
            font-weight: 600 !important;
            font-size: 28px !important;
        }

        @media (max-width: 991px) {
            .title {
                font-size: 22px !important;
            }
        }
    </style>

    <link rel="stylesheet" href="css/cert.css">
</head>

<body>
    <div>
        <!-- nav -->
        <header class="container" style="margin-bottom: 0 !important;">
            <div class="container head" style="margin-bottom: 0 !important">
                <a href="index.html">
                    <img src="images/phoenixacademy.png" alt="phoenixacademy logo" height="50" />
                </a>
                <div class="slogann">
                    <a href="index.html" id="bold">British Phoenix Academy </a>
                    <a href="index.html">
                        <span>Your gateway to excellence</span>
                    </a>
                </div>
            </div>
        </header>
        <nav class=" container navbar navbar-dark navbar-expand-lg bg-dark sticky-top" style="margin-bottom: 0 !important;">
            <div class="container-fluid" style="flex-direction: row-reverse">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav d-flex justify-content-evenly" style="width: 60%; margin: 0 auto; padding: 10px">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="aboutus.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="courses.html">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="partners.html">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="contactus.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="details">
            <div class="contant">
                <div class="w-100">
                    <?php
                    if ($found) {
                        echo ('
          <div class="info">
            <div class="certImage">
              <img src="images/phoenix_cert.jpg">
              <div class="top">
                <div class="var">Diploma in</div>
                <div class="var">' . $arr[0]['course'] . '</div>
                <div class="constant">AWARDED TO</div>
                <div class="var">' . $arr[0]['name'] . '</div>
                <div class="constant par">This is to certify that the above mentioned has<br>
                Successfully achieved the program<br>
                With all the rights and the privileges of the certificate<br>
                This Certificate has been given to him/her from<br>
                <span>Cambridge Global College</span></div>
                <div class="var gr">Degree: ' . $arr[0]['grade'] . '</div>
                <div class="constant date">Granted in: ' . $arr[0]['date'] . '</div>
                <div class="left-bottom">Registeration NO.: <span>' . $arr[0]['ID'] . '</span></div>
              </div>
            </div>
          </div>');
                    } else {
                        echo ('
            <div class="title" style="padding: 50px 0; text-transform: none;">Sorry, this ID is not registered!</div>
            ');
                    } ?>
                </div>
            </div>
        </section>


    </div>

    <!-- contact -->
    <div class="container" style="margin-top: 40px;">
        <div class="container contact">
            <div class="card-group">
                <div class="card border-0 bg-transparent" style="width: 18rem">
                    <img src="images/contact.png" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <p class="card-text">
                            Feel free to contact us on any of the provided methods and we
                            will respond as soon as possible.<br />You could also use our
                            form to contact us.
                        </p>
                    </div>
                    <div class="card-body text-center">
                        <button class="btn">
                            <a href="#" style="color: white">Contact</a>
                        </button>
                    </div>
                </div>
                <div class="card border-0 bg-transparent c-links" style="width: 18rem">
                    <div class="card-body">
                        <div class="wp"><a href="#">+20 1099359799</a></div>
                        <div class="fb"><a href="#">Phoenix Academy</a></div>
                        <div class="gmail"><a href="#">amrfayez.247@gmail.com</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="container" style="margin-bottom: 0 !important;">
        <div class="container" style="margin-bottom: 20px !important">
            <div class="foot-left">
                <img src="images/phoenixacademy.png" height="70" alt="" />
                <p>Your gateway to excellence</p>
            </div>
            <div class="foot-right">
                <h5>Quick Links</h5>
                <div class="q-links">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Courses</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr />
        <div class="cpy">
            Copyrights &copy; 2022. All Rights Reserved to Phoenix Academy.
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>