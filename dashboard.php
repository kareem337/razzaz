<?php 
include 'adminmenu.php';
include('classes/Admin.php');
$dashboard = new Admin();
$dashboard->getprofile();
?>

<html>
        <div class="user-wrapper">
         <img src="<?php print('img/personal-images/'.$dashboard->getimg());?>" width="40px;" height="40px;" alt="profile-img">
         <div class="">
            <h4><?php print($dashboard->getfirstname());?></h4>
            <small> Admin</small>
         </div>
        </div>
    
      </header>

      <main style="background:#668B91; margin-top: 70px; height: 651px;">
        <div class="cards">
          <div class="card-single">
            <div>
              <h1><?php print($dashboard->getUsersCount()); ?></h1>
              <span>Users</span>
            </div>
            <div>
              <span class="fas fa-users"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
              <h1><?php print($dashboard->getOrdersCount());?></h1>
              <span>Orders</span>
            </div>
            <div>
              <span class="fas fa-shopping-cart"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
              <h1><?php print($dashboard->getEnquiriesCount());?></h1>
              <span>Enquiries</span>
            </div>
            <div>
              <span class="fas fa-clipboard-list"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
              <h1><?php print($dashboard->getMuseumsCount());?></h1>
              <span>Museums</span>
            </div>
            <div>
              <span class="fas fa-landmark"></span>
            </div>
          </div>
          <div class="card-single">
            <div>
              <h1><?php print($dashboard->getTripsCount());?></h1>
              <span>Trips</span>
            </div>
            <div>
              <span class="fas fa-plane"></span>
            </div>
          </div>
        </div>
      </main>
    </div>
</html>
