<?php
  // Include database file
  // include 'classes/Admin.php';
  include'adminmenu.php';
  include 'controller/AdminController.php';
  $AdminC = new AdminController();
  // $Admin = new Admin();

  // Edit customer record
  if(isset($_GET['editId'])) 
  {
   
    // $editId = $_GET['editId'];
    $data = $AdminC->display();
    
  }

  // Update Record in customer table
  if(isset($_POST['update'])){

    // $name = $_POST['name'];
    // $location = $_POST['location'];
    // $price = $_POST['price'];
    // $description = $_POST['description'];
    // $image = $_POST['image'];
    // $id = $_POST['id'];
    // $background = $_POST['background';]
    
    $AdminC->edittrips();
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





<link rel="stylesheet" href="EditTrips.css">
<div class="">

  <form action="#" method="POST">

  
    <div >
      <label for="name">Name:</label>
      <input type="text" name="name" value="<?php echo $data['Name']; ?>" required="">
    </div>
    <div>
      <label for="email">Location:</label>
      <input type="text"  name="location" value="<?php echo $data['Location']; ?>" required="">
    </div>
    <div>
      <label for="username">Price:</label>
      <input type="text"  name="price" value="<?php echo $data['Price']; ?>" required="">
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
      <label for="username">BackGround Image:</label>
      <input type="text" class="form-control" name="background" value="<?php echo $data['Background']; ?>" required="">
    </div>
    <div>
      <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">
      <input type="submit" name="update" class="btn btn-success" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
