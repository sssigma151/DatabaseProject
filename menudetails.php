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


    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="a">
        <h2>menus </h2>
    </div>

    <br>
    <table>
        <tr>
            <th>Name</th>
            <th>type</th>
            <th>price</th>
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
        $sql3="SELECT name, type, price,food_details
                        FROM menu
                        where food_providernid=(SELECT id
                        FROM food_providern
                        WHERE phone_no LIKE '%1781891294%')";
        $run2=$conn->query($sql3);
        if ($run2->num_rows>0){
            while ($row=$run2->fetch_assoc()){
                echo "<tr><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["price"]."</td><td>".$row["food_details"]."</td> <td>"." <div class=\"w3-container\">"."<a href=\"menudetails.php\"class=\"w3-btn w3-orange\" name=\"view\">"."Add"."</a> </div>"."</td></tr>";

            }
            echo " </table>";

        }else
            echo "0 result";

        $conn->close();
        ?>

    </table>



</header>

</body>

</html>