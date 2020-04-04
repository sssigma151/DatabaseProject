
<!Doc type -project>
<html style="background-color: aquamarine">
<head class="f">
    <link rel="stylesheet" href="style.css"></link>
    <title>log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>

</head>
<body>
<form action="login.php" method="post" class="f" align="center">
    <h1 class="f" >Log-in</h1>
    <b>
        <label id="form">Email/phone:</label>
        <input name="email" type="text" id="form" placeholder=" Email/phone number " required></input></b>
    <br>
    <b>
        <label id="form">Password:</label>
        <input name="pass" type="password" id="form" placeholder="Password" required ></input></b>
    <br>
    <input name="login" type="submit" id="but" value="log in">
    <br>
    <div class="dropdown">
        <button class="dropbtn">registration</button>
        <div class="dropdown-content">
            <a href="userRegisterFrom.php">user</a>
            <a href="providerRegister.php">provider</a>
        </div>
    </div>

    <br>
    <a href="home.php"><input name="cancel" type="button" id="but" value="Back"></a>
</form>
<?php
$host_name='localhost';
$name='root';
$pass='';
$db_name='tiffin_box';

$con=mysqli_connect($host_name,$name,$pass) or di('database error');
mysqli_select_db($con,$db_name);

if(isset($_POST['login'])){
    $mail=$_POST['email'];
    $pass=$_POST['pass'];
    $q="select * from user where email='$mail' AND password='$pass'";
    $run1=mysqli_query($con,$q);
    $q2="select * from food_providern where phone_no='$mail' and password=$pass";
    $run2=mysqli_query($con,$q2);
    if($run1){
        if(mysqli_num_rows($run1)>0){
        echo " <script>
              alert('you are logged in 1');
              window.location.href('home.php');
               </script>";
            header('location:logout1.php');
    }
    else if(mysqli_num_rows($run2)>0){
            echo "
                            <script>
                              alert('you are logged in 2');
                              window.location.href('logout.php?mail=email');
                             </script>
                             ";
            header('location:logout.php');
    }
    else{
        echo "
                            <script>
                              alert('wronge password or email/phone number');
                              window.location.href('logout.php');
                             </script>
                             ";
        header('location:login.php');
    }
    }else{
        echo "
                            <script>
                              alert('error');
                              window.location.href('login.php');
                             </script>
                             ";
        header('location:login.php');
    }

}


?>
?>
</body>

</html>
