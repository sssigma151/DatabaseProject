
<!Doc type -project>
<html style="background-color: aquamarine">
<head class="f">
    <link rel="stylesheet" href="style.css"></link>
    <title>add menu</title>

</head>
<body>
<form action="menu_insert.php" method="post" class="f" align="center">
    <h1 class="f" >add menu</h1>
    <b>
        <label id="form">menu Name: </label>
        <input name="m_name" type="text" id="form" placeholder="enter your food name" required></input>
    </b>
    <br>
    <b>
        <label id="form">price</label>
        <input name="price" type="text" id="form" placeholder="food price" required ></input></b>
    <br>
    <b>
        <label id="form">food details:</label>
        <input name="de" type="text" id="form" placeholder="enter food details" required></input></b>
    <br>
    <label id="form">type</label>

    <select id="form"  name="type" >
        <option value="veg">veg</option>
        <option value="non ves">non veg</option>

    </select>
    <br>


    <input name="add" type="submit" id="but" value="add menu">
    <br>
    <a href="logout.php" ><input name="back_home" type="button" id="but" value="Back"></a>

</form>

<?php

$host_name='localhost';
$name='root';
$pass='';
$db_name='tiffin_box';

$con=mysqli_connect($host_name,$name,$pass) or di('database error');
mysqli_select_db($con,$db_name);



if(isset($_POST['add'])) {
    $name = $_POST['m_name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $detail=$_POST['de'];

    $i = 0;
    $q = "INSERT INTO menu(id,name,type,price,food_providernid) VALUES($i=$i+1,'$name','$type','$price','18')";
    $run = mysqli_query($con, $q);
    if ($run) {

        echo "
                            <script>
                              alert('insert');
                             </script>
                             ";
        echo "new item added food name: $name, food price:$price";
        header('logout.php');
    } else
        echo " not added ";
}
?>
</body>

</html>