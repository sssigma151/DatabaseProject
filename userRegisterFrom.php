
<?php
include 'config.php';
?>

<!Doc type -project>
<html style="background-color: aquamarine">
    <head class="f">
        <link rel="stylesheet" href="style.css"></link>
        <title>registration for user</title>

    </head>
    <body>
        <form action="userRegisterFrom.php" method="post" class="f" align="center">
            <h1 class="f" >Registration form</h1>
            <b>
            <label id="form">Name: </label>
            <input name="name" type="text" id="form" placeholder="your name" required></input>
            </b>
            <br>
            <b>
            <label id="form">Email:</label>
            <input name="u_email" type="email" id="form" placeholder=" Email " required></input></b>
            <br>
            <b>
            <label id="form">Password:</label>
            <input name="u_pass" type="password" id="form" placeholder="Password" required ></input></b>
            <br>
            <b>
            <label id="form">Confirm Password:</label>
            <input name="u_c_pass" type="password" id="form" placeholder="Confirm your password" required></input></b>
            <br>
            <input name="reg" type="submit" id="but" value="Submit">
            <br>
            <a href="home.php" ><input name="back_home" type="button" id="but" value="Back"></a>

        </form>


        <?php

        $host_name='localhost';
        $name='root';
        $pass='';
        $db_name='tiffin_box';

        $con=mysqli_connect($host_name,$name,$pass) or di('database error');
        mysqli_select_db($con,$db_name);



        if(isset($_POST['reg']))
        {
            $name=$_POST['name'];
            $email=$_POST['u_email'];
            $pass=$_POST['u_pass'];
            $cpass=$_POST['u_c_pass'];

            if($pass==$cpass){
                $query="select * from user where email='$email'";
                $query_c=mysqli_query($con,$query);
                if($query_c){
                    if(mysqli_num_rows($query_c)>0){
                        echo "
                            <script>
                              alert('email already exsist');
                             </script>
                             ";
                    }
                    else{
                        $i=0;
                      $insertion="INSERT INTO user(id,name,password,email) VALUES($i=$i+1,'$name','$pass','$email')";
                      $run=mysqli_query($con,$insertion);
                      if($run){
                          echo "
                            <script>
                              alert('you are succesfully registered');
                             </script>
                             ";

                      }else{
                          echo "
                            <script>
                              alert('connection faild');
                             </script>
                             ";



                      }
                    }
                }else
                {

                    echo "
                            <script>
                              alert('database error');
                             </script>
                             ";


                }
            }else{

                echo "
                            <script>
                              alert('error');
                             </script>
                             ";

            }

        }
        else{
            echo "
                            <script>
                              alert('submit button problem');
                             </script>
                             ";



        }

        ?>

    </body>

</html>