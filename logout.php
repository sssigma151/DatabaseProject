
//<?php
//require_once('FoodProviderMenuController.php');
//require_once('FoodProviderMenuModel.php');

//$name_controller=new NameController();

//$all_information_array =(array) $name_controller->getName();

//?>


<html>
<head>
    <title>provider is logged in</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            color: white;
        }


        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }

        tr:nth-child {
            background-color: #dddddd;
        }

        div.a {
            text-align: center;
            color: white;
        }

    </style>

</head>
<body>

<header>
    <div class="main">

        <ul>
            <li><a href="logout.php">Home</a></li>
            <li><a href="menu_insert.php"> Add menu</a></li>
            <li><a href="providerProfile.php"> My profile</a></li>
            <li><a href="menu_update.php"> Update menu</a></li>
            <li><a href="menu_delete.php"> Delete menu</a></li>
            <li><a href="order.php">Orders</a></li>
            <li> <a href="home.php">Log out</a></li>
        </ul>
    </div>



    <div class="title" >
        <h1>Tiffin Box</h1>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="a">
        <h2>Update and Delete your data carefully </h2>
    </div>

    <br>


    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
            <th>Update Data</th>
            <th>Delete Data</th>
        </tr>

        <?php
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "tiffin_box";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //$mail=$_GET['email'];
        $sql3="SELECT id,name,price,food_details
                        FROM menu
                        where food_providernid=(SELECT id
                        FROM food_providern
                        WHERE phone_no LIKE '%1781891294%')";
        //echo "$sql3";
        $run2=$conn->query($sql3);
        if ($run2->num_rows>0){
            while ($row=$run2->fetch_assoc()){
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td><td>".$row["food_details"]."</td><td> <div class=\"w3-container\">"."<a href=\"menu_update.php\"class=\"w3-btn w3-orange\" name=\"d\">"."Update"."</td><td> <div class=\"w3-container\">"."<a href=\"logout.php\"class=\"w3-btn w3-orange\" name=\"view\">"."Delete"."</a> </div></td></tr>";


            }
            echo " </table>";

        }else
            echo "0 result";
        $sql = "DELETE FROM menu WHERE id=15";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
        ?>

        <!-- <?php

        //  for ($i = 0; $i < sizeof($all_bus_information_array); $i++) {
        ////       echo "<tr>";
        ///      echo "  <td >" . $all_information_array[$i]->getID() . "</td >";
        ///      echo "  <td >" . $all_information_array[$i]->getName() . "</td >";
        //      echo "  <td >" . $all_information_array[$i]->getPrice() . "</td >";



        ?>
 -->

        <!-- <tr>
          <td>13</td>
          <td>Vorta-vat</td>
          <td>40</td>
          <td> <div class="w3-container">
          <a href="#" class="w3-btn w3-orange">Update Data</a>
          </div></td>
          <td><div class="w3-container">
          <input type="button" class="w3-btn w3-red" value="Delete Data"></a>
          </div></td>

        </tr>
        <tr>
          <td>14</td>
          <td>Dal-vat</td>
          <td>25</td>
          <td> <div class="w3-container">
          <a href="#" class="w3-btn w3-orange">Update Data</a>
          </div></td>
          <td><div class="w3-container">
          <input type="button" class="w3-btn w3-red" value="Delete Data"></a>
          </div></td>
        </tr>
        <tr>
          <td>15</td>
          <td>Chicken curry & rice</td>
          <td>60</td>
          <td> <div class="w3-container">
          <a href="#" class="w3-btn w3-orange">Update Data</a>
          </div></td>
          <td><div class="w3-container">
          <input type="button" class="w3-btn w3-red" value="Delete Data"></a>
          </div></td>
        </tr>
         -->


    </table>

</header>

</body>

</html>

<php>

</php>