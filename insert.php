<?php
include("config.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $dup_email=mysqli_query($conn,"SELECT * FROM signup WHERE email='$email'");
    if(mysqli_num_rows($dup_email)){
        echo "
        <script>
        alert('this email is already taken')
         window.location.href='login.php';
        </script>
        ";

    }else{

     $run=mysqli_query($conn,"INSERT INTO `signup`(`username`, `name`, `number`, `email`) VALUES ('$username','$name','$number','$email')");
     echo "
        <script>
        alert('Successfully Signup')
         window.location.href='login.php';
        </script>
        ";
}
}
?>