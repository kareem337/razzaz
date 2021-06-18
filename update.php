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

    <!-- <style>
      
      table, td, th {  
      border: 1px solid #ddd;
      text-align: left;
      }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 15px;
    }
      
      
      
    </style> -->
    </head>


<div class="h" > <h1><b> Update In Trip Information<b> </h1></div>




<body>
<link rel="stylesheet" href="EditTrips.css">
<div class="table">

  <form action="#" method="POST">

  <table>
   <tr>
    <div >
      <label for="name">Name:</label>
      <input type="text" name="name" style="text-align: left; border: 1px solid #ddd; width: 20%; margin-left:110px ; padding: 2px;"
        value="<?php echo $data['Name']; ?>" required=""><br><br><br>
    </div>
    <div>
      <label for="email">Location:</label>
      <input type="text"  name="location" style="text-align: left; border: 1px solid #ddd; width: 20%;  margin-left:90px;  padding: 2px;"
       value="<?php echo $data['Location']; ?>" required=""><br><br><br>
    </div>
    <div>
      <label for="username" >Price:</label>
      <input type="text"  name="price" style="text-align: left; border: 1px solid #ddd; width: 20%; margin-left:120px;  padding: 2px;"
       value="<?php echo $data['Price']; ?>" required=""><br><br><br>
    </div>
    <div>
      <label for="username">Description:</label>
      <input type="text" class="form-control" name="description" style="text-align: left; border: 1px solid #ddd; width: 20%;  margin-left:70px;  ;padding: 2px;"
       value="<?php echo $data['Description']; ?>" required=""><br><br><br>
    </div>
    <div>
      <label for="username">Image:</label>
      <input type="text" class="form-control" name="image" style="text-align: left; border: 1px solid #ddd; width: 20%;  margin-left:110px ; padding: 2px;"
       value="<?php echo $data['Image']; ?>" required=""><br><br><br>
    </div>
    <div>
      <label for="username">BackGround Image:</label>
      <input type="text" class="form-control" name="background" style="text-align: left; border: 1px solid #ddd; width: 20%;  margin-left:4px; padding: 2px;"
       value="<?php echo $data['Background']; ?>" required=""><br><br><br>
    </div>
    <div>
      <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">
      <input type="submit" name="update" class="btn btn-success" style="float:right; background-color: #42ed45; hight:2%; width:8%;  " value="Update">
      </tr>
      </table>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
