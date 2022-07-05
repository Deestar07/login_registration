
 <?php
 $name = $_POST['user'];
 $pass = $_POST['password'];

 // Database connection
 // connection code
 $conn = new mysqli('localhost', 'root', '', 'user_registration');

 $s = "select * from `user` where Username = '$name' && Password = '$pass'";

 $result = mysqli_query($conn, $s);
 //  $numberofusers = mysqli_num_rows($result);
 $numberofusers = password_verify($pass, $hash);

 //  a random variable created to prevent same username entry

 if ($numberofusers == true) {
     echo 'VALID password for the informed HASH!<br>';
     var_dump($numberofusers);
 } else {
     echo 'INVALID password for the informed HASH!<br>';
     var_dump($numberofusers);

     //  if ($numberofusers > 0) {
     //      header('location:home.php');
     //  } else {
     //      header('location:login.php');
     //      echo 'Details Incorrect!';
 }
 ?>


