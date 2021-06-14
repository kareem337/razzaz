<?php
  // Include database file
  include 'classes/Admin.php';
  $Admin = new Admin();

  // Edit customer record
  if(isset($_GET['editId'])) {
    $editId = $_GET['editId'];
    $data = $Admin->displayTripById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $id = $_POST['id'];

    $Admin->updateTrip($location,$name,$price,$description,$image,$id);
  }


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    table{
			border:1px solid #000;
		}
		table td,table th {
			border:1px solid #000;
		}
    </style>

<div class="h" > <h1><b> Update In Trip Information<b> </h1></div>
</head>
<body>


<header >
   <?php
   include'NavBarH.php';
   ?>
</header>


<link rel="stylesheet" href="EditTrips.css">
<div class="">

  <form action="update.php" method="POST">
  <!-- <table class="mx-auto" id="f">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Trip Name</th>
      <th scope="col">Trip Location</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Picture</th>
      <th scope="col">Delete </th>
      <th scope="col">Update </th>
    </tr>
  </thead>
    <tr>
  <td><input type="text" name="tname" id="Tname"></td>
   <td><input type="text" name="tloc" id="Tloc"></td>
    <td><input type="number"  name="tprice" id="Tprice" ></td>
     <td><input type="text" name="tdesc" id="Tdesc"></td> 
     <td><input type="text" name="tpic" id="Tpic"></td>
     <td><button  value="save" name="save" class="btn btn-success" style="margin-bottom: 20px; width: 100px; font-size: 18px;"> Save </button></td>
  </tr>
  </table> -->

  
    <div>
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $data['Name']; ?>" required="">
    </div>
    <div>
      <label for="email">Location:</label>
      <input type="text" class="form-control" name="location" value="<?php echo $data['Location']; ?>" required="">
    </div>
    <div>
      <label for="username">Price:</label>
      <input type="text" class="form-control" name="price" value="<?php echo $data['Price']; ?>" required="">
    </div>
    <div>
      <label for="username">Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $data['Description']; ?>" required="">
    </div>
    <div>
      <label for="username">Image:</label>
      <input type="text" class="form-control" name="image" value="<?php echo $data['Image']; ?>" required="">
    </div>
    <div>
      <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">
      <!-- <input type="submit" name="delete" class="btn btn-danger" style="float:right;" value="Delete"> -->
      <input type="submit" name="update" class="btn btn-success" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
