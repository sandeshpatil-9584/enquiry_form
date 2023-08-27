<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_showroom";
$ip=getenv("REMOTE_ADDR");
date_default_timezone_set('Asia/Kolkata');
$time=date("Y-m-d h:i:sa");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['submit']))
{
$name=$_POST['full_name'];
$mobile=$_POST['phone_number'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

  
if ((preg_match ("/^[a-zA-z]*$/", $name)) && (preg_match ("/^[0-9]*$/", $mobile) ) && (preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)))   
{  
  $sql = "INSERT INTO contact_form  VALUES ('','$name','$mobile','$email','$subject','$message','$ip','$time')";
  
  if(mysqli_query($conn, $sql))
  {

      echo "Your responce send..";
      

     
  } 
  else{
  echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
  }
   
} 

else
{

  $ErrMsg = "Only alphabets and whitespace are allowed.";  
  echo $ErrMsg;  

}


}


?>