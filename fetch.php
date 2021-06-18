<?php
$connect = mysqli_connect("localhost", "root", "", "razzaztours");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM users 
	WHERE ID LIKE '%".$search."%' ||
        First Name LIKE '%".$search."%' ||
        Last Name LIKE '%".$search."%' ||
        Number LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM users ORDER BY ID ASC";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th> User Id </th>
                                                        <th> First Name </th>
                                                        <th> Last Name </th>
                                                        <th> Number  </th>
						</tr>';
	while($res = mysqli_fetch_array($result))
	{
          $searchQuery = "SELECT 'Fisrt Name' FROM users WHERE ID = '".$res['ID']."'";
          $searchResult = mysqli_query($connect, $searchQuery);
          while($row = mysqli_fetch_array($searchResult))
             {
                 $FName = $row['First Name'];
               
             }
		$output .= '
			<tr>
				<td>'.$res['ID'].'</td>
				<td>'.$FName.'</td>
				<td>'.$res['Last Name'].'</td>
				<td>'.$res['Number'].' $</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>