<?php
    $myDB= mysqli_connect('localhost', 'root', '', 'am-phoenix');
    $error=array();
    if(isset($_POST['AddCourse'])) {
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $image= mysqli_real_escape_string($myDB, $_POST['image']);
        $info = "INSERT INTO `courses` (`ID`, `name`, `image`) VALUES (NULL, '$name', '$image')";
        mysqli_query($myDB, $info);
        header("location: course.php");

    } elseif(isset($_POST['EditCourse'])) {
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $newName= mysqli_real_escape_string($myDB, $_POST['newName']);
        $image= mysqli_real_escape_string($myDB, $_POST['image']);
        $info = "UPDATE `courses` SET `name`='$newName',`image`='$image' WHERE `name`='$name'";
        mysqli_query($myDB, $info);
        header("location: course.php");

    // }  elseif(isset($_POST['removeCourse'])) {
    //     $name= mysqli_real_escape_string($myDB, $_POST['name']);
    //     $info = "DELETE FROM `courses` WHERE `name`='$name'";
    //     mysqli_query($myDB, $info);
    //     header("location: course.php");

    } elseif(isset($_POST['AddCenter'])) {
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $image= mysqli_real_escape_string($myDB, $_POST['image']);
        $phone1= mysqli_real_escape_string($myDB, $_POST['phone1']);
        $phone2= mysqli_real_escape_string($myDB, $_POST['phone2']);
        $location= mysqli_real_escape_string($myDB, $_POST['location']);
        $email= mysqli_real_escape_string($myDB, $_POST['email']);
        $info = "INSERT INTO `centers` (`ID`, `name`, `img`, `phone1`, `phone2`, `mail`, `location`) VALUES (NULL, '$name', '$image', '$phone1', '$phone2', '$email', '$location')";
        mysqli_query($myDB, $info);
        header("location: center.php");

    } elseif(isset($_POST['EditCenter'])) {
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $newName= mysqli_real_escape_string($myDB, $_POST['newName']);
        $image= mysqli_real_escape_string($myDB, $_POST['image']);
        $phone1= mysqli_real_escape_string($myDB, $_POST['phone1']);
        $phone2= mysqli_real_escape_string($myDB, $_POST['phone2']);
        $location= mysqli_real_escape_string($myDB, $_POST['location']);
        $email= mysqli_real_escape_string($myDB, $_POST['email']);
        $info = "UPDATE `centers` SET `name`='$newName',`img`='$image',`phone1`='$phone1',`phone2`='$phone2',`mail`='$email',`location`='$location' WHERE `name`='$name'";
        mysqli_query($myDB, $info);
        header("location: center.php");

    // }  elseif(isset($_POST['removeCenter'])) {
    //     $name= mysqli_real_escape_string($myDB, $_POST['name']);
    //     $info = "DELETE FROM `centers` WHERE `name`='$name'";
    //     mysqli_query($myDB, $info);
    //     header("location: center.php");

    } elseif(isset($_POST['AddCertificate'])) {
        $id= mysqli_real_escape_string($myDB, $_POST['id']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $course= mysqli_real_escape_string($myDB, $_POST['course']);
        $date= mysqli_real_escape_string($myDB, $_POST['date']);
        $grade= mysqli_real_escape_string($myDB, $_POST['grade']);
        $info = "INSERT INTO `certificates` (`ID`, `name`, `course`, `date`, `grade`) VALUES ('$id', '$name', '$course', '$date', '$grade')";
        mysqli_query($myDB, $info);
        header("location: cert.php");   

    }  elseif(isset($_POST['EditCertificate'])) {
        $old= mysqli_real_escape_string($myDB, $_POST['oldID']);
        $id= mysqli_real_escape_string($myDB, $_POST['id']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $course= mysqli_real_escape_string($myDB, $_POST['course']);
        $date= mysqli_real_escape_string($myDB, $_POST['date']);
        $grade= mysqli_real_escape_string($myDB, $_POST['grade']);
        $info = "UPDATE `certificates` SET `ID`='$id',`name`='$name',`course`='$course',`date`='$date', `grade`='$grade' WHERE `id` = '$old' ";
        mysqli_query($myDB, $info);
        header("location: cert.php");

    // } elseif(isset($_POST['DELETE'])){
    //     $serial= mysqli_real_escape_string($myDB, $_POST['id']);
    //     $info = "DELETE FROM `certificates` WHERE `ID`='$serial'";
    //     mysqli_query($myDB, $info);
    //     header("location: cert.php");
    
    }  elseif(isset($_POST['AddInstructor'])) {
        $image= mysqli_real_escape_string($myDB, $_POST['image']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $prof= mysqli_real_escape_string($myDB, $_POST['profession']);
        $nation= mysqli_real_escape_string($myDB, $_POST['nationality']);
        $info = "INSERT INTO `instructors` (`image`, `name`, `profession`, `nation`) VALUES ('$image', '$name', '$prof', '$nation')";
        mysqli_query($myDB, $info);
        header("location: instruct.php");

    }  elseif(isset($_POST['EditInstructor'])) {
        $old= mysqli_real_escape_string($myDB, $_POST['oldName']);
        $image= mysqli_real_escape_string($myDB, $_POST['image']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $prof= mysqli_real_escape_string($myDB, $_POST['profession']);
        $nation= mysqli_real_escape_string($myDB, $_POST['nationality']);
        $info = "UPDATE `instructors` SET `image`='$image',`name`='$name',`profession`='$prof',`nation`='$nation' WHERE `name`='$old'";
        mysqli_query($myDB, $info);
        header("location: instruct.php");

    // }  elseif(isset($_POST['remove'])) {
    //     $name= mysqli_real_escape_string($myDB, $_POST['name']);
    //     $info = "DELETE FROM `instructors` WHERE `name`='$name'";
    //     mysqli_query($myDB, $info);
    //     header("location: instruct.php");

    }  elseif(isset($_POST['AddFAQ'])) {
        $ques= mysqli_real_escape_string($myDB, $_POST['q']);
        $ans= mysqli_real_escape_string($myDB, $_POST['a']);
        $info = "INSERT INTO `faqs`(`question`, `answer`) VALUES ('$ques','$ans')";
        mysqli_query($myDB, $info);
        header("location: faq.php");

    }  elseif(isset($_POST['EditFAQ'])) {
        $id= mysqli_real_escape_string($myDB, $_POST['oldID']);
        $ques= mysqli_real_escape_string($myDB, $_POST['q']);
        $ans= mysqli_real_escape_string($myDB, $_POST['a']);
        $info = "UPDATE `faqs` SET `question`='$ques',`answer`='$ans' WHERE `ID`='$id'";
        mysqli_query($myDB, $info);
        header("location: faq.php");

    // }  elseif(isset($_POST['delFAQ'])) {
    //     $id= mysqli_real_escape_string($myDB, $_POST['id']);
    //     $info = "DELETE FROM `faqs` WHERE `ID`='$id'";
    //     mysqli_query($myDB, $info);
    //     header("location: instruct.php");

    } elseif(isset($_POST['AddCambridge'])) {
        $id= mysqli_real_escape_string($myDB, $_POST['id']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $course= mysqli_real_escape_string($myDB, $_POST['course']);
        $date= mysqli_real_escape_string($myDB, $_POST['date']);
        $grade= mysqli_real_escape_string($myDB, $_POST['grade']);
        $info = "INSERT INTO `cambridge_cert` (`ID`, `name`, `course`, `date`, `grade`) VALUES ('$id', '$name', '$course', '$date', '$grade')";
        mysqli_query($myDB, $info);
        header("location: cambridge.php");   

    }  elseif(isset($_POST['EditCambridge'])) {
        $old= mysqli_real_escape_string($myDB, $_POST['oldID']);
        $id= mysqli_real_escape_string($myDB, $_POST['id']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $course= mysqli_real_escape_string($myDB, $_POST['course']);
        $date= mysqli_real_escape_string($myDB, $_POST['date']);
        $grade= mysqli_real_escape_string($myDB, $_POST['grade']);
        $info = "UPDATE `cambridge_cert` SET `ID`='$id',`name`='$name',`course`='$course',`date`='$date', `grade`='$grade' WHERE `id` = '$old' ";
        mysqli_query($myDB, $info);
        header("location: cambridge.php");

    // } elseif(isset($_POST['DelCambridge'])){
    //     $serial= mysqli_real_escape_string($myDB, $_POST['id']);
    //     $info = "DELETE FROM `cambridge_cert` WHERE `ID`='$serial'";
    //     mysqli_query($myDB, $info);
    //     header("location: cambridge.php");

    } elseif(isset($_POST['AddPhoenix'])) {
        $id= mysqli_real_escape_string($myDB, $_POST['id']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $course= mysqli_real_escape_string($myDB, $_POST['course']);
        $date= mysqli_real_escape_string($myDB, $_POST['date']);
        $grade= mysqli_real_escape_string($myDB, $_POST['grade']);
        $info = "INSERT INTO `phoenix_cert` (`ID`, `name`, `course`, `date`, `grade`) VALUES ('$id', '$name', '$course', '$date', '$grade')";
        mysqli_query($myDB, $info);
        header("location: phoenix.php");   

    }  elseif(isset($_POST['EditPhoenix'])) {
        $old= mysqli_real_escape_string($myDB, $_POST['oldID']);
        $id= mysqli_real_escape_string($myDB, $_POST['id']);
        $name= mysqli_real_escape_string($myDB, $_POST['name']);
        $course= mysqli_real_escape_string($myDB, $_POST['course']);
        $date= mysqli_real_escape_string($myDB, $_POST['date']);
        $grade= mysqli_real_escape_string($myDB, $_POST['grade']);
        $info = "UPDATE `phoenix_cert` SET `ID`='$id',`name`='$name',`course`='$course',`date`='$date', `grade`='$grade' WHERE `id` = '$old' ";
        mysqli_query($myDB, $info);
        header("location: phoenix.php");

    }
?>