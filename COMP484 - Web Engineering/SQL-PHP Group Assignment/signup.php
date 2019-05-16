<html>
<head></head>
<body>
    <?php
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $lastName = trim($_POST['lastName']);
        $firstName = trim($_POST['firstName']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);

        //connect to database
        $connection = mysqli_connect("localhost","webphp","password");
        mysqli_select_db($connection,"finaldb");


        if ((empty($firstName)) || (empty($lastName)) || (empty($email)) || (empty($phone)) || (empty($username)) || (empty($password)))
        {
            echo "One or more of the required fields has not been set.";
            echo "Please go back and fill out all required fields.";
        }
        else
        {    
            //check if credentials already exist
            $selectQuery = "SELECT username FROM auth WHERE username = '$username'";
            $selecting = mysqli_query($connection,$selectQuery);
            if(mysql_num_rows($selecting) > 0)
            {
                echo "This username already exists";
                echo "Please go back and change your username";
            }
            else
            {
                $insertNewInfo = "INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ($username, $password,    $firstName, $lastName, $email, $phone)";
                $insertingNewUser = mysqli_query($connection,$selectQuery);
                echo "You are registered now!";
    
                showTable();
            }
        }
    
        function showTable()
        {
            $getTable = "SELECT firstName,lastName FROM auth";
            $gettingTable = mysqli_query($connection,$getTable);

            while($singleRow = mysqli_fetch($gettingTable))
            {
                $fieldFirstName = $singleRow["firstName"];
                $fieldLastName = $singleRow["lastName"];
                
                echo '<tr>
                        <td>'.$fieldFirstName.'</td> 
                        <td>'.$fieldLastName.'</td>
                </tr>';
            }
        }

    mysqli_close($connection);
    ?>
</body>
</html>
