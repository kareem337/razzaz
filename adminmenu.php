<html>
<header>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</header>
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
          <h1> <img src="assets/img/navv1.png" style= "margin-left: -20px;width:75; height:75; ">
          </h1>
        </div>
        
        <div class="sidebar-menu">
          <ul>
            <li>
              <a href="dashboard.php" class="active">
                <span class="fas fa-tachometer-alt"></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fas fa-users" ></span>
                <span>Edit Users</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="far fa-eye"></span>
              <span>View Orders</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fas fa-clipboard-list"></span>
                <span>View Enquiries</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fas fa-boxes"></span>
                <span>Edit Trips</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fas fa-user-circle"></span>
                <span>Edit Museums</span>
              </a>
            </li>
            <li>
              <a href="logout.php">
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
          Dashboard
        </h2>
</html>