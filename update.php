<?php
  include'adminmenu.php';
  include 'controller/AdminController.php';
  $AdminC = new AdminController();

  // Edit customer record
  if(isset($_GET['editId'])) 
  {
   
    
    $data = $AdminC->display();
    
  }

  // Update Record in customer table
  if(isset($_POST['update'])){

    
    $AdminC->edittrips();
  }


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
    </head>


<div class="h" > <h1><b> Update In Trip Information<b> </h1></div>

<br>


<body style= " background-color: #668B91;">
<!-- <h2 style="text-align: center;">Update Data</h2> -->
<link rel="stylesheet" href="assets/css/Admin.css">
<div class="table">

  <form action="" method="POST">

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
      <input type="submit" name="update" class="success" style="float:right;  " value="Update">
      <input type="hidden" name="categ" value="<?php echo $data['category'] ?>">
      </tr>
      </table>
    </div>
  </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
