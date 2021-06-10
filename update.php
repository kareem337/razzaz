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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4></h4>
</div><br> 

<div class="container">
  <form action="edit.php" method="POST">
  <table class="mx-auto" id="ta">
    <thead>
    <tr>
      <th scope="col">Trip Name</th>
      <th scope="col">Trip Location</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Picture</th>
      <th scope="col">Save </th>
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
  </table>

  
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Location:</label>
      <input type="text" class="form-control" name="location" value="<?php echo $data['location']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Price:</label>
      <input type="text" class="form-control" name="price" value="<?php echo $data['Price']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Description:</label>
      <input type="text" class="form-control" name="description" value="<?php echo $data['Description']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="username">Image:</label>
      <input type="text" class="form-control" name="image" value="<?php echo $data['image']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">
      <input type="submit" name="delete" class="btn btn-danger" style="float:right;" value="Delete">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
