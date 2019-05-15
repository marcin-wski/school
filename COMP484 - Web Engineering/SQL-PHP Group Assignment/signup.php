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

        if(empty($firstName))
        {
            echo "Please go back and fill out your first name";
        }

        if(empty($lastName))
        {
            echo "Please go back and fill out your last name";
        }

        if(empty($email))
        {
            echo "Please go back and fill out your email address";
        }

        if(empty($phone))
        {
            echo "Please go back and fill out your phone number";
        }

        if(empty($username))
        {
            echo "The username is empty!\n";
            echo "Please go back and input the username";
        }

        if(empty($password))
        {
            echo "The password is empty!\n";
            echo "Please go back and input the password";
        }

        //connect to database
        $connection = mysqli_connect("localhost","webphp","password");
        mysqli_select_db($connection,"finaldb");

        //check if credentials already exist
        $selectQuery = "SELECT username FROM auth WHERE username = '$username'";
        $selecting = mysqli_query($connection,$selectQuery);
        if($selecting || mysql_num_rows($selecting) > 0)
        {
            echo "This username already exists";
            echo "Please go back and change your username";
        }
        else
        {
            $insertNewInfo = "INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ($username, $password, $firstName, $lastName, $email, $phone)";
            $insertingNewUser = mysqli_query($connection,$selectQuery);
            echo "You are registered now!";

            showTable();
        }

    function showTable()
    {
        $getTable = "SELECT * FROM auth";
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

mysql_close($connection);

?>
</body>
</html>
