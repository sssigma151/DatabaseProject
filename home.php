<html>
<head>
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            color: black;
            background-color: aquamarine;
        }


        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;

        }

        tr:nth-child() {
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
    <div class="box">
        <form action="home.php" method="post">
            <input type="text" required class="form-control" id="start_point" name="start_point"
                   list="start_point_list"  placeholder="Set your location here ">

            <datalist id="start_point_list">


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

                $sql = "SELECT DISTINCT name FROM location";
                $result = $conn->query($sql);
                $food_stoppage = array();
                if ($result->num_rows > 0) {
                    // output data of each row

                    while ($row = $result->fetch_assoc()) {
                        //keep $row["name"] into an array
                        array_push($food_stoppage, $row["name"]);
                    }
                }
                $conn->close();

                // print all food-stop in a loop
                foreach ($food_stoppage as $x => $value) {
                    echo "<option value='" . $value . "'>";
                }

                ?>
            </datalist>


            <input type="submit" name="sea" value="Search">



        </form>

    </div>

</header>
<table>
    <tr>
        <th>Name</th>
        <th>Rating</th>
        <th>Details</th>
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
    if(isset($_POST['sea'])){
        $loc=$_POST['start_point'];
        $sql2="SELECT name,rating, details
                           FROM food_providern
                           where locationid=(
                           SELECT id 
                           FROM location 
                           WHERE name LIKE '%$loc%')";
        $run1=$conn->query($sql2);
        if ($run1->num_rows>0){
            while ($row=$run1->fetch_assoc()){
                echo "<tr><td>".$row["name"]."</td><td>".$row["rating"]."</td><td>".$row["details"]."</td> <td>"." <div class=\"w3-container\">"."<a href=\"menudetails.php\"class=\"w3-btn w3-orange\" name=\"viewmenu\">"."view Details"."</a> </div>"."</td></tr>";

            }
            echo " </table>";

        }else
            echo "0 result";

    }
    $conn->close();
    ?>

</table>




</body>

</html>
