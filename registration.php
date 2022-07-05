
 <?php
 $name = $_POST['user'];
 $pass = $_POST['password'];
 $pass = password_hash($pass, PASSWORD_DEFAULT);

 // Database connection
 // connection code

 $conn = new mysqli('localhost', 'root', '', 'user_registration');

 $s = "select  COUNT(*) as totalNumberUsers from `user` where Username = '$name'";

 $result = mysqli_query($conn, $s);
 $numberofusers = mysqli_fetch_assoc($result);
 $numberofusers = intval($numberofusers['totalNumberUsers']);
 //  a random variable created to prevent same username entry
 if ($numberofusers > 0) {
     echo 'Username Already Taken';
 } else {
     // to check the connection with the database
     if ($conn->connect_error) {
         die('connection failed : ' . $conn->connect_error);
     } else {
         $stmt = $conn->prepare("insert into user(Username,Password)
        values(?, ? )");
         // pass the variable name for the binding. S for string
         $stmt->bind_param('ss', $name, $pass);
         // execute the query
         $stmt->execute();
         echo 'Registration Succesful';

         //finally close the request statement and the connection
         $stmt->close();
         $conn->close();
     }
 }


?>
