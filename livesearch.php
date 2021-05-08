<?php 

  include('DB.php');
  session_start();

  if(isset($_GET['trip'])){
// write query for all pizzas
  $sql = 'SELECT * FROM trips';

  // get the result set (set of rows)
  $result = mysqli_query($conn, $sql);

$trip="";

  while($row = mysqli_fetch_array($result)){

 if ($trip=="") {

          $trip="<div class='col-lg-4 col-md-6 portfolio-item filter-app'><img src='img/".$row['image']."' class='img-fluid'/> <div class='portfolio-info'>
              <h4>".$row['location'] . "</h4><p>".$row['name']."</p>
              <a ><i class='icofont-external-link' id='".$row['ID']."' onClick='showTrip(this.id)'></i></a></div></div>"; 
              }   else {
          $trip=$trip."<div class='col-lg-4 col-md-6 portfolio-item filter-app'><img src='img/".$row['image']."' class='img-fluid'/> <div class='portfolio-info'>
              <h4>".$row['location'] . "</h4><p>".$row['name']."</p>
              <a ><i class='icofont-external-link' id='".$row['ID']."' onClick='showTrip(this.id)'></i></a></div></div>";    
              } 
  }

  echo $trip;
}

elseif(isset($_GET['query'])){

$query = $_GET['query']; 
  // gets value sent over search form
  
    
    $query = htmlspecialchars($query); 
    // changes characters used in html to their equivalents, for example: < to &gt;
    
    $query = mysqli_real_escape_string($conn,$query);
    // makes sure nobody uses SQL injection

  $raw_results = mysqli_query($conn,"SELECT * FROM trips
      WHERE (`location` LIKE '%".$query."%') OR (`name` LIKE '%".$query."%')") or die(mysqli_error());
    
          $hint="";

if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
      


      while($results = mysqli_fetch_array($raw_results)){
      // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
      
     if ($hint=="") {
          $hint="<a id='".$results['ID']."' onClick='showTrip(this.id)'' target='_blank'>".$results['name']. "</a>";
        } else {
          $hint=$hint . "<br><a id='".$results['ID']."' onClick='showTrip(this.id)'' target='_blank'>".$results['name']. "</a>";
        }

        
      }
      
    }
    if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
    
  }
  elseif(isset($_GET['ID'])){

$_SESSION["Clicked_Trip_ID"]=$_GET['ID'];
echo $_SESSION["Clicked_Trip_ID"];


}
  
  // close connection
  // mysqli_close($conn);
 


?>