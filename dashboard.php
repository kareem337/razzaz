<?php 
include 'adminmenu.php';
include 'controller/AdminController.php';
$AdminC = new AdminController();
$AdminC->getprofile();
?>
<html>

</style>
      <main style="background:#668B91; margin-top: 50px; height: 671px;">
        <div class="cards" style = "margin-top: 80px;">
         <a href = "EditUsersInfoH.php" style = "text-decoration: none;">      
          <div class="card-single">
            <div>
              <h1><?php print($AdminC->usercount()); ?></h1>
              <span>Users</span>    
            </div>
            <div>
              <span class="fas fa-users"></span>
            </div>
          </div>
         </a>     
         <a href = "orderssH.php" style = "text-decoration: none;">        
          <div class="card-single">
            <div>   
              <h1><?php print($AdminC->ordercount());?></h1>
              <span>Orders</span>
            </div>
            <div>
              <span class="fas fa-shopping-cart"></span>
            </div>
          </div>
          </a> 
          <a href = "message_users.php">     
          <div class="card-single">
            <div>
              <h1><?php print($AdminC->enquiriescount());?></h1>
              <span>Enquiries</span>
            </div>
            <div>
              <span class="fas fa-clipboard-list"></span>
            </div>
          </div>
          </a>
          <a href = "Editmuseums.php">   
          <div class="card-single">
            <div>
              <h1><?php print($AdminC->museumscount());?></h1>
              <span>Museums</span>
            </div>
            <div>
              <span class="fas fa-landmark"></span>
            </div>
          </div>
           </a>
          <a href = "EdittripsH.php">   
          <div class="card-single">
            <div>
              <h1><?php print($AdminC->tripscount());?></h1>
              <span>Trips</span>
            </div>
            <div>
              <span class="fas fa-plane"></span>
            </div>
          </div>
          </a>
        </div>
      </main>
    </div>
</html>
