<?php
 
    include("connect.php");  // Connect to database
   
 
    if(isset($_POST['b1'])  && !empty($_POST['q1']) 
            && !empty($_POST['q8'] == $_POST['q9'])) {   
         mysqli_query($conn,"insert into login set
                             username = '".$_POST['q3']."',
                            userpassword = '".$_POST['q9']."'");
                     
        $id1 = mysqli_insert_id($conn);
        mysqli_query($conn,"insert into register set
                            firstname = '".$_POST['q1']."'  ,
                            lastname  = '".$_POST['q2']."'  ,
                            username  = '".$_POST['q3']."'  ,
                            dob  = '".$_POST['q4']."'  ,
                            gender  = '".$_POST['q5']."'  ,             
                            email   = '".$_POST['q6']."'  ,
                            mobileno  = '".$_POST['q7']."'  ,
                            password  = '".$_POST['q8']."'  ,
                            repeatpassword  = '".$_POST['q9']."'");
       
        $id2 = mysqli_insert_id($conn);   // Return row id from DB   
        if (isset($_POST['b1'] )  && !empty($_POST['q1'])) {
            echo"<b><i>You Registered Successfully</i>/<b>";
        }
   }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="index.css">

    <!-- For google icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <title>Registration form</title>

</head>

<body>

    <!-- for background -->
    <div class="background"></div>

    <!-- for form container -->
    <div class="container">
        <h2>Registration</h2>
        <form action="">

            
                <div class="form-item">
                    <span class="material-icons-outlined">
                        manage_accounts
                        </span>
                    <label class="label-title">Account Type</label>
                            <input type="radio" name="atype" value="student" id="student">Student
                            <input type="radio" name="atype" value="mentor" id="mentor">Mentor
                    </div>
                
            <div class="form-item">
                <span class="material-icons-outlined">
                    badge
            </span>
                <input type="text" name="name" id="name" placeholder="Name">
            </div>
            <div class="form-item">
                <span class="material-icons-outlined">
                    calendar_today
            </span>
                <input type="date" name="bd" id="bd" placeholder="Date of Birth">← Click here for DoB
            </div>

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

            <button type="submit">Sign up</button>

            
            <p>Already have account? <a href="index.php"> Sign in here</a></p>

        </form>
    </div>
</body>

</html>