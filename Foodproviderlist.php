<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <div class="main">

        <ul>
            <li> <a href="home.php">Home</a></li>
            <li> <a href="#">contact us</a></li>
            <li class="active">Registration
                <ul>
                    <li> <a href="providerRegister.php">Provider</a></li>
                    <li> <a href="userRegisterFrom.php">User</a></li>
                </ul>
            </li>
            <li> <a href="login.php">Log in</a></li>
        </ul>
    </div>
    <div class="title" >
        <h1>Tiffin Box</h1>
    </div>

</header>

</body>

</html>

<?php
$host_name='localhost';
$name='root';
$pass='';
$db_name='tiffin_box';

$con=mysqli_connect($host_name,$name,$pass) or di('database error');
mysqli_select_db($con,$db_name);
if(isset($_POST['sea'])){
    $start_point=$_POST('start_point');
    $qjoin="";
}

?>
