<?php

include 'DB.php';

if(!empty($_REQUEST['function']) && $_REQUEST['function'] == "checkEmail")
{

$select = mysqli_query($conn, "SELECT `Email` FROM `users`") ;
$result_array = array();

   if ($select->num_rows > 0) {

    while($row = $select->fetch_assoc()) {

    	array_push($result_array, $row);
    }
    //  send a JSON encded array to client 

	echo json_encode($result_array);

}
}

elseif(!empty($_REQUEST['function'] && $_REQUEST['function'] == "adduser"))
{	 

	 $first_name = mysqli_real_escape_string($conn,$_POST['firstname']);
	 $last_name = mysqli_real_escape_string($conn,$_POST['lastname']);
	 $email = mysqli_real_escape_string($conn,$_POST['email']);
	 $gender = mysqli_real_escape_string($conn,$_POST['gender']);
	 $num = mysqli_real_escape_string($conn,$_POST['number']);
	 $password = mysqli_real_escape_string($conn,$_POST['password']);
      
      
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    return;

}



	 $sql = "INSERT INTO `users` (`ID`, `First Name`, `Last Name`, `Email`, `Gender`, `Number`, `Password`) 
	 VALUES (NULL, '$first_name', '$last_name', '$email', '$gender', '$num', '$password')";

	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error in SignUp please insert correct data";
	 }
	$conn->close();
}



?>
