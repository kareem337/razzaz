<html>
<header>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</header>
    <style>
     .hov:hover {
        background: #fff;
        padding-top: 1rem;
        padding-bottom: 1rem;
        color: var(--main-color);
        border-radius: 30px 0px 0px 30px;
     }
    </style>
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
          <h1> <img src="assets/img/navv1.png" style= "margin-left: -20px;width:75; height:75; ">
          </h1>
        </div>
        
        <div class="sidebar-menu">
          <ul>
            <li>
              <a href="dashboard.php" class = "hov">
                <span class="fas fa-tachometer-alt" ></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="EditUsersInfoH.php" class = "hov">
                <span class="fas fa-users" ></span>
                <span>Users</span>
              </a>
            </li>
            <li>
              <a href="orderssH.php" class = "hov">
                <span class="fas fa-shopping-cart"></span>
              <span>Orders</span>
              </a>
            </li>
            <li>
              <a href="#" class = "hov">
                <span class="fas fa-clipboard-list"></span>
                <span>Enquiries</span>
              </a>
            </li>
            <li>
              <a href="EditTripsH.php" class = "hov">
                <span class="fas fa-plane"></span>
                <span>Trips</span>
              </a>
            </li>
            <li>
              <a href="EditMuseums.php" class = "hov">
                <span class="fas fa-landmark"></span>
                <span>Museums</span>
              </a>
            </li>
            <li>
              <a href="logout.php" class = "hov">
                <span class="fa fa-sign-out"></span>
                <span>Logout</span>
              </a>
            </li>  
          </ul>

        </div>
    </div>    

    <div class="main-content">
      <header style="background:#344850;">
        <h2>
          <label for="nav-toggle">
            <span class="fas fa-bars"></span>
          </label>
        </h2>
        </header>
</html>