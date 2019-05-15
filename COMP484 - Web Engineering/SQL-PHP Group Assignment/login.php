<?php
$username = trim($_POST['username']);
$password = trim($_POST['password']);

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

// Validate credentials
$selectQuery = "SELECT username, password FROM auth WHERE username = '$username' and password = '$password'";
$selecting = mysqli_query($connection,$selectQuery);
if(!$selecting || mysql_num_rows($selecting) <= 0)
{
  echo "Incorrect username or password.";
  echo "Please go back and input the password";
}

//welcoming message if the user logged in
$selectPass = "SELECT password FROM auth WHERE username = '$username'";
$selectingPass = mysqli_query($connection,$selectQuery);
if($selectingPass == $password)
{
  echo "<p>Welcome back $username! Login was successful</p>";
  echo "\n";
  $getTable = "SELECT * FROM auth";
  $gettingTable = mysqli_query($connection,$getTable);
  while($singleRow = mysqli_fetch($gettingTable))
  {
    $fieldUsername = $singleRow["username"];
    $fieldPassword = $singleRow["password"];
    $fieldFirstName = $singleRow["firstName"];
    $fieldLastName = $singleRow["lastName"];
    $fieldEmail = $singleRow["email"];
    $fieldPhone = $singleRow["phone"];
      
    echo '<tr>
            <td>'.$fieldUsername.'</td> 
            <td>'.$fieldPassword.'</td> 
            <td>'.$fieldFirstName.'</td> 
            <td>'.$fieldLastName.'</td> 
            <td>'.$fieldEmail.'</td>
            <td>'.$fieldPhone.'</td> 
         </tr>';
  }
}
else
{
  echo "Incorrect username or password.";
  echo "Please go back and input the password";
}

mysql_close($connection);

?>
