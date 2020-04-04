
<!Doc type -project>
<html style="background-color: aquamarine">
    <head class="f">
        <link rel="stylesheet" href="style.css"></link>
        <title>registration for user</title>

    </head>
    <body>
        <form action="providerRegister.php" method="post" class="f" align="center">
            <h1 class="f" >Registration form</h1>
            <b>
            <label id="form">Company Name: </label>
            <input name="com_name" type="text" id="form" placeholder="enter your company name" required></input>
            </b>
            <br>
            <b>
            <label id="form">phone number</label>
            <input name="phn" type="text" id="form" placeholder="company phone number" required></input></b>
            <br>
            <b>
            <label id="form">Password:</label>
            <input name="p_pass" type="password" id="form" placeholder="Password" required ></input></b>
            <br>
            <b>
            <label id="form">Confirm Password:</label>
            <input name="p_c_pass" type="password" id="form" placeholder="Confirm your password" required></input></b>
            <br>
            <label id="form">location</label>

            <select id="form"  name="location" >
                <option value="1">Adabor</option>
                <option value="2">Uttar Khan</option>
                <option value="3">Uttara</option>
                <option value="4">Kadamtali</option>
                <option value="5">Kalabagan</option>
                <option value="6">Kafrul</option>
                <option value="7">Kamrangirchar</option>
                <option value="8">Cantonment</option>
                <option value="9">Kotwali</option>
                <option value="10">Khilkhet</option>
                <option value="11">Khilgaon</option>
                <option value="12">Gulshan</option>
                <option value="13">Gendaria</option>
                <option value="14">Chackbazar</option>
                <option value="15">Demra</option>
                <option value="16">Turag/option>
                <option value="17">Tejgaon</option>
                <option value="19">Dakshinkhan</option>
                <option value="20">Darus Salam</option>
                <option value="21">Dhanmondi</option>
                <option value="22">New Market</option>
                <option value="23">Paltan</option>
                <option value="24">Pallabi</option>
                <option value="25">Bangshal</option>
                <option value="26">Badda</option>
                <option value="27">Bimanbandar</option>
                <option value="28">Motijhil</option>
                <option value="29">Mirpur</option>
                <option value="30">Mohammadpur</option>
                <option value="31">Jatrabari</option>
                <option value="32">Ramna</option>
                <option value="33">Rampura</option>
                <option value="34">Lalbag</option>
                <option value="35">Shah Ali</option>
                <option value="36">Shahbag</option>
                <option value="37">Sher-e-Bangla NAgar</option>
                <option value="38">Shyampur</option>
                <option value="39">Sabujbag</option>
                <option value="40">Sutrapur</option>
                <option value="41">Hazaribagh</option>
            </select>
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
            $name=$_POST['com_name'];
            $phn=$_POST['phn'];
            $pass=$_POST['p_pass'];
            $cpass=$_POST['p_c_pass'];
            $loc=$_POST['location'];

            if($pass==$cpass){
                $query="select * from food_providern where phone_no='$phn'";
                $query_c=mysqli_query($con,$query);
                if($query_c){
                    if(mysqli_num_rows($query_c)>0){
                        echo "
                            <script>
                              alert('phone number already exsist');
                             </script>
                             ";
                        header('location:login.php');
                    }else{
                        $i=0;
                      $insertion="INSERT INTO food_providern (id,name,password,phone_no,start_date,locationid) VALUES($i=$i+1,'$name','$pass','$phn',CURRENT_DATE ,'$loc')";
                      $run=mysqli_query($con,$insertion);
                      if($run){
                          echo "
                            <script>
                              alert('you are successfully registered');
                             </script>
                             ";
                          header('location:login.php');

                      }else{
                          echo "
                            <script>
                              alert('connection failed');
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
                              alert(' password not match error');
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