<?php
require_once('model/AdminModel.php');
Class EditProductView extends AdminModel
{
    public function searchTripView()
    {
        echo '<div class="h" >
        <h1> Razzaz Tours Trip Informations </h1>
        <form method="GET">
        <input type = "text" name= "search" class = "text">
           <button class="fas fa-search" style = "margin-left: 20px; margin-left:-45px; width: 50px; height: 50px; background: transparent; border: transparent;" type="submit"></button>
       </form>
       </div>';
    }
    public function searchMuseumeView()
    {
        echo '<div class="h" >
        <h1> Razzaz Tours Museums Informations </h1>
        <form method="GET">
        <input type = "text" name= "search" class = "text">
           <button class="fas fa-search" style = "margin-left: 20px; margin-left:-45px; width: 50px; height: 50px; background: transparent; border: transparent;" type="submit"></button>
       </form>
       </div>';
    }
    public function fetchTrips()
    {
       
        echo '<form method="POST">
        <div class="scroll"> 
      
    <table class="mx-auto" id="customers">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Trip Name</th>
          <th scope="col">Trip Location</th>
          <th scope="col">Price</th>
          <th scope="col">Description</th>
          <th scope="col">Picture</th>
          <th scope="col">Background Image</th>
          <th scope="col">Delete </th>    
          <th scope="col">Update </th>
        </tr>
      </thead>
      <tbody>';
        
         
     
           $query = "SELECT * FROM products WHERE category = 1 ";
           $result = $this->connect()->query($query);
          
    
    
            while($row = $result -> fetch_array(MYSQLI_ASSOC)) {             
                $id = $row['ID'];
                $tname = $row['Name'];
                $location = $row['Location'];
                $price = $row['Price'];  
                $dis = $row['Description'];  
                $pic = $row['Image']; 
                $background = $row['Background'];
                
        echo '
        <tr>
            <td> '.$id.' <input type="hidden" value=" '.$id.'"></td>
            <td> <input name="tname" type="text" id="tname" value="  '.$tname.' "></td>
        <td> <input name="location" type="text" id="location" value=" '.$location.'"></td>
        <td><input name="price" type="number" id="price" minlength="1" value="'.$price.'"></td>
        <td> 
          <textarea rows = "5" cols = "70" name = "description">
               '.$dis.' 
          </textarea>
        </td>
        <td><input name="pic" type="text" id="pic" value=" '.$pic.' "></td> 
        <td><input name="background" type="text" id="background" value="'.$background.' "></td> 
        <td style="width: 80px;" > <a href="EditTripsH.php?delete= '.$id.'"><button value="delete"type="button" name="delete" class="failure" style=" width: 100px; font-size: 16px; background-color: #f44336; "> Delete </button></a></td>
        <td style="width: 80px;" > <a href="update.php?editId='.$id.'"><button value="update"type="button" name="update" class="success" style=" width: 110px; font-size: 16px;"> Update </button></a></td>
        
    </tr>';


        }
      echo '
    </tbody>
    </table>
    </div>
    </form>
    ';
    }
    
    public function addTripform()
    {
        echo '

        <form method="POST" id="form1" style="display: none;">
          <table class="mx-auto" id="customers">
            <thead>
            <tr>
              <th scope="col">Trip Name</th>
              <th scope="col">Trip Location</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Picture</th>
              <th scope="col">BackGround Image</th>
              <th scope="col">Save</th>
             
              
            </tr>
          </thead>
            <tr>
             <td><input type="text" name="tname" id="Tname"></td>
             <td><input type="text" name="tloc" id="Tloc"></td>
             <td><input type="number"  name="tprice" id="Tprice" ></td>
             <td><input type="text" name="tdesc" id="Tdesc"></td> 
             <td><input type="text" name="tpic" id="Tpic"></td>
             <td><input type="text" name="tbackground" id="Tbackground"></td>
             <td><button value="save" name="save" type="submit" class="success" style="margin-bottom: 20px; width: 100px; font-size: 18px;"> Save </button></td>
          </tr>
          </table>
        </form>
        <button type="button" class="success" value="add" onclick="openForm()" id="a_b" style="margin-bottom: 20px;  font-size: 18px; Background-color:#1974D2; border:transparent; border-radius: 12px; margin-left:70px; margin-top:15px; color:white;">Add Trip</button>
        
        
        ';
    }

    public function fetchMuseums()
    {
       
        echo '<form method="POST">
        <div class="scroll"> 
      
    <table class="mx-auto" id="customers">
      <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Museum Name</th>
        <th scope="col">Museum Location</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Picture</th>
        <th scope="col">Background Image</th>
        <th scope="col">Delete </th>    
        <th scope="col">Update </th>
        </tr>
      </thead>
      <tbody>';
        
         
     
           $query = "SELECT * FROM products WHERE category = 2 ";
           $result = $this->connect()->query($query);
          
    
    
            while($row = $result ->fetch_array(MYSQLI_ASSOC)) {             
                $id = $row['ID'];
                $tname = $row['Name'];
                $location = $row['Location'];
                $price = $row['Price'];  
                $dis = $row['Description'];  
                $pic = $row['Image']; 
                $background = $row['Background'];
                
        echo '
        <tr>
            <td> '.$id.' <input type="hidden" value=" '.$id.'"></td>
            <td> <input name="tname" type="text" id="tname" value="  '.$tname.' "></td>
        <td> <input name="location" type="text" id="location" value=" '.$location.'"></td>
        <td><input name="price" type="number" id="price" minlength="1" value="'.$price.'"></td>
        <td> 
          <textarea rows = "5" cols = "70" name = "description">
               '.$dis.' 
          </textarea>
        </td>
        <td><input name="pic" type="text" id="pic" value=" '.$pic.' "></td> 
        <td><input name="background" type="text" id="background" value="'.$background.' "></td> 
        <td style="width: 80px;" > <a href="EditMuseums.php?delete= '.$id.'"><button value="delete"type="button" name="delete" class="failure" style=" width: 100px; font-size: 16px; background-color: #f44336; "> Delete </button></a></td>
        <td style="width: 80px;" > <a href="update.php?editId='.$id.'"><button value="update"type="button" name="update" class="success" style=" width: 110px; font-size: 16px;"> Update </button></a></td>
        
    </tr>';

    
        }
      echo '
    </tbody>
    </table>
    </div>
    </form>
    ';
    }

    public function addmuseumeform()
    {
        echo '

        <form method="POST" id="form1" style="display: none;">
          <table class="mx-auto" id="customers">
            <thead>
            <tr>
            <th scope="col">Museum Name</th>
            <th scope="col">Museum Location</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Picture</th>
            <th scope="col">BackGround Image</th>
            <th scope="col">Save</th>
             
              
            </tr>
          </thead>
            <tr>
             <td><input type="text" name="tname" id="Tname"></td>
             <td><input type="text" name="tloc" id="Tloc"></td>
             <td><input type="number"  name="tprice" id="Tprice" ></td>
             <td><input type="text" name="tdesc" id="Tdesc"></td> 
             <td><input type="text" name="tpic" id="Tpic"></td>
             <td><input type="text" name="tbackground" id="Tbackground"></td>
             <td><button value="save" name="save" type="submit" class="success" style="margin-bottom: 20px; width: 100px; font-size: 18px;"> Save </button></td>
          </tr>
          </table>
        </form>
        <button type="button" class="success" value="add" onclick="openForm()" id="a_b" style="margin-bottom: 20px;  font-size: 18px; Background-color:#1974D2; border:transparent; border-radius: 12px; margin-left:70px; margin-top:15px; color:white;">Add Museum</button>
        
        
        ';
    }
}

?>