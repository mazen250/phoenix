<?php
include('addEdit.php');
include('server.php');
if(!isset($_SESSION['success'])){
    header("location: index.php");
}
?>
<?php
    $myDB= mysqli_connect('localhost', 'root', '', 'am-phoenix');
    $sql= "SELECT * FROM courses";
    $result= mysqli_query($myDB, $sql);
    $arr= mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $sql= "DELETE FROM courses WHERE `name`='$id'";
        $result= mysqli_query($myDB, $sql);
        header("location: cert.php");
    }
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $sql= "SELECT * FROM courses WHERE `name`='$id'";
        $res= mysqli_query($myDB, $sql);
        $arr1= mysqli_fetch_all($res, MYSQLI_ASSOC);
        $edit=true;
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
    <link rel="stylesheet" href="css/form.css">
    
    <style>
        .table{
            width: 60%;
            margin: 0 auto;
            min-width: 300px;
        }
        .table h3{
            margin-top: 50px;
        }
        .table table{
            margin-bottom: 50px;
        }
        @media (max-width:550px){
            .table{
                font-size: x-small;
            }
        }
        td img{
            padding: 5px;
            width: 32px;
        }

.pagination .page-item {
    padding: 0;
}

.pagination .page-item a {
    color: #dc3545;
    font-weight: bold;
}

.aloo {
    color: white !important;
    background-color: #dc3545;
}

.aloo:hover {
    color: white !important;
    background-color: #dc3545;
}

.s-div{
    justify-content: center;
    margin: 30px;
}
.me-2{
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    margin: 0;
    margin-right: 0 !important;
}
.me-2:focus{
    box-shadow: none;
    border-color: #bb2d3b;
}
.s-btn{
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
    </style>

    <link rel="stylesheet" href="css/new.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container container-fluid">
            <div class="alo">
                <a class="navbar-brand" href="home.php"><img src="images/phoenixacademy.png" height="35" alt=""></a>
                <button class="navbar-toggler out" style="border: none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" style="text-align: center;" href="course.php">Courses</a>
                    <a class="nav-link" style="text-align: center;" href="cert.php">Certificates</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- content -->
    <!-- choose -->
    <div class="welcome welcome1 <?php if(isset($edit)){echo('hide');}?>">
        <h1>Do you want to:</h1>
        <div class="options">
            <button class="btn btn-lg btn-danger add">Add</button>
            <!-- <button class="btn btn-lg btn-danger edit">Edit</button>
            <button class="btn btn-lg btn-danger del">Delete</button> -->
        </div>
        <div class="table">
                <?php
                $myDB= mysqli_connect('localhost', 'root', '', 'am-phoenix');
                $sql= "SELECT * FROM courses";
                $result= mysqli_query($myDB, $sql);
                $arr= mysqli_fetch_all($result, MYSQLI_ASSOC);

                // centers per page
                $numArr = count($arr);
                $numPages = ceil($numArr / 10);
                if (!isset($_GET['ID']) || $_GET['ID'] == 0) {
                    $id = 1;
                } elseif ($_GET['ID'] > ceil(count($arr) / 10)) {
                    $id = ceil(count($arr) / 10);
                } else {
                    $id = $_GET['ID'];
                }
                $start = ($id - 1) * 10;
                if(isset($_POST['Search']) && !empty($_POST['keyword'])){
                    $key = mysqli_real_escape_string($myDB, $_POST['keyword']);
                    $sql = "SELECT * from courses WHERE `name` like '%".$key."%'";
                    $search = true;
                    $id=1;
                } else{
                    $sql = "SELECT * from courses LIMIT $start,10";
                    $search = false;
                }
                $i = ($id*10)-9;
                $res = mysqli_query($myDB, $sql);
                $thisArr = mysqli_fetch_all($res, MYSQLI_ASSOC);
                ?>

                <form method="post" class="d-flex s-div" role="search">
                    <input autocomplete="off" class="form-control me-2" type="search" name="keyword" placeholder="" aria-label="Search">
                    <input class="btn btn-danger s-btn" name="Search" type="submit" value="Search">
                </form>

                <table class="table table-striped">
                    <tr>
                        <th>#</th> <th>Name</th><td></td>
                    </tr>
                    <?php
                    foreach($thisArr as $row){
                        echo('
                        <tr>
                            <td>'.$i.'</td><td>'.$row['name'].'</td><td><a id="edit" href="course.php?edit='.$row['name'].'"><img src="images/edit.png"></a><a href="course.php?delete='.$row['name'].'" id="del"><img src="images/remove.png"></a></td>
                        </tr>
                        ');
                        $i+=1;
                    }
                    ?>
                </table>
                <?php
                if(!$search){
                if (ceil(count($arr) / 10) > 1) {
                    echo ('
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                            <a class="page-link" href="course.php?ID=' . ($id - 1) . '" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="course.php?ID=1">1</a></li>');
                    for ($i = 1; $i < ceil(count($arr) / 10); $i++) {
                        echo ('<li class="page-item"><a class="page-link" href="course.php?ID=' . ($i + 1) . '">' . ($i + 1) . '</a></li>');
                    }
                    echo ('
                            <li class="page-item">
                            <a class="page-link" href="course.php?ID=' . ($id + 1) . '" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                        </ul>
                    </nav>
                    ');
                }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- add -->
    <div class="welcome welcome2 hide">
        <h1>Add Course</h1>
        <form method="POST" id="form">
            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                <input type="hidden" name="image" value="" id="realImage">
            </div>
            <div class="mb-3">
                <label class="form-label">Add Image</label>
                <input class="form-control form-control-sm" name="file" type="file" id="selbtn"><br>
                <button id="upbtn" class="btn btn-sm btn-danger" style="margin-top: -20px; margin-bottom:30px">Upload Image</button>
                <br><label style="font-size:medium" id="proglab"></label><br>
            </div>
            <input class="btn btn-danger btn-lg" type="submit" name="AddCourse" value="AddCourse" class="bottom" id="add">
        </form>
    </div>
    <!-- edit -->
    <div class="welcome welcome3 <?php if(!isset($edit)){echo('hide');}?>">
        <h1>Edit Certificate</h1>
        <form method="POST" id="form">
            <input type="hidden" name="name" value="<?php echo($id)?>">
            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" class="form-control" name="newName" value="<?php echo($id)?>">
                <!-- <input type="hidden" name="image" value="" id="realImage1"> -->
            </div>
            <!-- <div class="mb-3">
                <label class="form-label">Add Image</label>
                <input class="form-control form-control-sm" name="file" type="file" id="selbtn1"><br>
                <button id="upbtn1" class="btn btn-sm btn-danger" style="margin-top: -20px; margin-bottom:30px">Upload Image</button>
                <br><label style="font-size:medium" id="proglab1"></label><br>
            </div> -->
            <input class="btn btn-danger btn-lg" type="submit" name="EditCourse" value="EditCourse" class="bottom" id="edit">
        </form>
    </div>
    <!-- delete -->
    <div class="welcome welcome4 hide">
        <h1>Remove Course</h1>
        <form method="POST" id="form">
            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" >
            </div>
            <input class="btn btn-danger btn-lg" type="submit" name="removeCourse" value="Remove" class="bottom" id="del">
        </form>
    </div>

    <script type="text/javascript">
        let add= document.querySelector(".add");
        // let edit= document.querySelector(".edit");
        // let del= document.querySelector(".del");

        add.addEventListener("click", (e)=>{
            document.querySelector('.welcome1').classList.add("hide");
            document.querySelector('.welcome2').classList.remove("hide");
        });
        // edit.addEventListener("click", (e)=>{
        //     document.querySelector('.welcome1').classList.add("hide");
        //     document.querySelector('.welcome3').classList.remove("hide");
        // });
        // del.addEventListener("click", (e)=>{
        //     document.querySelector('.welcome1').classList.add("hide");
        //     document.querySelector('.welcome4').classList.remove("hide");
        // });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-analytics.js";
        const firebaseConfig = {
          apiKey: "AIzaSyBoM2u7EZgfCsOEjNsX9RHjC0yUb78mpTM",
          authDomain: "britishboar.firebaseapp.com",
          projectId: "britishboar",
          storageBucket: "britishboar.appspot.com",
          messagingSenderId: "643083691949",
          appId: "1:643083691949:web:86d1d2d3ea8b066fde2324",
          measurementId: "G-JE2SKKXGBC"
        };
      
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        // 
        import{getStorage, ref as sRef, uploadBytesResumable, getDownloadURL}
            from "https://www.gstatic.com/firebasejs/9.10.0/firebase-storage.js";
        // 
        var files=[];
        var reader= new FileReader();
        var proglab= document.getElementById('proglab');
        var selbtn= document.getElementById('selbtn');
        var upbtn= document.getElementById('upbtn');

        var proglab1= document.getElementById('proglab1');
        var selbtn1= document.getElementById('selbtn1');
        var upbtn1= document.getElementById('upbtn1');

        var add= document.getElementById("add");
        var edit= document.getElementById("edit");

        selbtn.onchange = e =>{
            files= e.target.files;
            reader.readAsDataURL(files[0]);
        }
        let img="";
        // upload image
        async function upload(){
            img="";
            var imgtoupload= files[0];
            var imgname= files[0]['name'];
            const storage= getStorage(app);
            const storageRef= sRef(storage, "images/"+imgname);
            const uploadTask= uploadBytesResumable(storageRef, imgtoupload);
            uploadTask.on('stat-changed', (snapshot)=>{
                var prog = (snapshot.bytesTransferred/snapshot.totalBytes)*100;
                proglab.innerHTML="Upload is "+prog+"% complete";
            }, (error)=>{
                proglab.innerHTML="Error uploading";
            }, ()=>{
                getDownloadURL(uploadTask.snapshot.ref).then((downloadURL)=>{
                    document.getElementById("realImage").value = downloadURL;
                });
            })
        }
        upbtn.addEventListener("click", (e)=>{
            e.preventDefault();
            upload();
        });


        selbtn1.onchange = e =>{
            files= e.target.files;
            reader.readAsDataURL(files[0]);
        }
        // upload image
        async function upload1(){
            img="";
            var imgtoupload= files[0];
            var imgname= files[0]['name'];
            const storage= getStorage(app);
            const storageRef= sRef(storage, "images/"+imgname);
            const uploadTask= uploadBytesResumable(storageRef, imgtoupload);
            uploadTask.on('stat-changed', (snapshot)=>{
                var prog = (snapshot.bytesTransferred/snapshot.totalBytes)*100;
                proglab1.innerHTML="Upload is "+prog+"% complete";
            }, (error)=>{
                proglab1.innerHTML="Error uploading";
            }, ()=>{
                getDownloadURL(uploadTask.snapshot.ref).then((downloadURL)=>{
                    document.getElementById("realImage1").value = downloadURL;
                });
            })
        }
        upbtn1.addEventListener("click", (e)=>{
            e.preventDefault();
            upload1();
        });
      </script>

<script type="text/javascript">
    let pages= document.querySelectorAll(".page-link");
    let page= <?php echo"$id"?>;
    pages[page].classList.add("active");
</script>
</body>