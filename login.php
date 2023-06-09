<?php
     session_start();   // Session start
 
     include("connect.php");
     if(isset($_POST['b1']) && !empty($_POST['q1']) 
                            && !empty($_POST['q2'])) {
         $q=mysqli_query($conn,
                  "select * from login where username = '"
                  . $_POST['q1'] . "' and userpassword = '"
                  . $_POST['q2'] ."'");
        
         $num = mysqli_num_rows($q);
        
         if($num > 0) {
            $row = mysqli_fetch_array($q);
 
            $_SESSION['sid']   =   $row[0];
            $_SESSION['sname'] =   $row[1];
            
            // URL Redirection to another page //
            header("location:registercomplaint.php");
            exit();
         }
         else {
           echo"<hr> Sorry Wrong /Invalid Username or Password !<hr>";
         }
     }
 
     // LOGOUT CODE
     if(isset($_GET['todo'])  && $_GET['todo']=="logout" ) {
        session_unset();
        //  session_destroy();
     }               
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="index.css">

    <!-- For google icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <title>Login form</title>

</head>

<body>

    <!-- for background -->
    <div class="background"></div>
    <!-- for form container -->
    <div class="container">
        <h2>Login</h2>
        <form action="">

            <div class="form-item">
                <span class="material-icons-outlined">
              account_circle
            </span>
                <input type="text" name="user" id="user" placeholder="Email or Username">
            </div>

            <div class="form-item">
                <span class="material-icons-outlined">
              lock
            </span>
                <input type="password" name="pass" id="pass" placeholder="Password">
            </div>

            <button type="submit">Login</button>

            

            <p>New User ? <a href="reg.php"> Create an Account</a></p>

        </form>
    </div>
</body>

</html>