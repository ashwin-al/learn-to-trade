<?php 

$con = new mysqli("localhost","root","","sdb");

if(!$con){
    die ("not connected".mysqli_error($con));
}
else{
    if(isset($_POST["register"]))
    {
      $name = mysqli_real_escape_string($con,$_POST['user']);
      $email = mysqli_real_escape_string($con,$_POST['mail']);
      $createPassword = mysqli_real_escape_string($con,$_POST['pass1']);
      $reEnterPassword = mysqli_real_escape_string($con,$_POST['pass1']);
      $sql = "INSERT INTO newsignup(user,mail,pass1,pass2) VALUES ('$name','$email','$createPassword','$reEnterPassword')";
      $result = mysqli_query($con,$sql);
      if(!$result){
          echo "not register...!!!";
        }
        else {
            echo "<script>alert('You have registered successfully!')</script>";
            echo "<script>window.location.href='login.html';</script>";
            exit;
        }
        mysqli_close($con);
    }
}
?>