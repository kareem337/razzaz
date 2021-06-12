
<?php
$dbname = "razzaztours";
$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server,$username,$password,$dbname);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search</title>
	<style>
		body {
			margin: 0;
		}


		#menu {
			width:100%;
			height:70px;
			background:#000;
			display: flex;
			align-items: center;
			color:#fff;
		}
		#menu a {
			margin:0 5px;
		}

		a {
			text-decoration:none;
			color:inherit;
		}

		table {
			border:1px solid #000;
		}
		table td,table th {
			border:1px solid #000;
		}
	</style>
</head>
<body>

<!-- include("xxx.php"); -->

<form method="GET">
Email: <input type="text" name="s" >
<button type="submit">Submit</button>
</form>
<?php
if(isset($_GET['s']))
{
$query = "SELECT * FROM users WHERE email LIKE '%".$_GET['s']."%'";
$result = mysqli_query($conn,$query);
if(!$result)
{
	var_dump($result,$_GET['s']);
	echo "<br>There's no records that matches your search input";
	exit;
}

?>
<table>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Email</th>
		
	</tr>
	<?php
		while($row = $result -> fetch_array(MYSQLI_ASSOC)) 
		{             
		    $id = $row['ID'];
		    $fname = $row['First Name'];
			$lname = $row['Last Name'];
			$Gender = $row['Gender'];
		    $email = $row['Email'];
		 
    ?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $fname; ?></td>
		<td><?php echo $lname; ?></td>
		<td><?php echo $Gender; ?></td>
		<td><?php echo $email; ?></td>
	</tr>
		    <?php
		}   
}
	?>
</table>
</body>
</html>