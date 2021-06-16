<?php
require_once('model/PersonModel.php');
class PersonView extends PersonModel
{
    public function fetchSignIn()
    { 
        echo ' <div class="signin-form">
        <form id="SignInF" method="POST" action = "SignInH.php">
    
              <h1>Sign In</h1>
    
        <p id="p">Please fill this form to Sign In.</p>';


        if (isset($_SESSION['error'])) {
            ?>
                <div class='alert alert-danger bar error close' data-dismiss = 'alert'>
                <?php echo  $_SESSION['error']; ?>
                </div>
                <?php }
         ?>
     <?php
      if (isset($confirm)) {?>
            <div class='alert alert-success bar success close' data-dismiss = 'alert'>
            <?php echo  $_SESSION['confirm']; ?>
            </div>
             <?php }
        
        
        echo'
   
        <hr>
    
            <div class="form-group">
                <div class="row">
    
                <div class="col-xs-3">
                    <input type="text" id="email" name="email" placeholder="Email" class="form-control" required>
                </div>
            </div>
        </div>
    
                <div class="form-group">
                    <input type="password" id="pwd" name="pwd" placeholder="Password" class="form-control" required>
                </div>
    
                <div class="form-group">
                     <button type="submit" value="Submit" name="sign_in" class="btn btn-success btn-lg">Sign In</button>
                </div>
            
    
        </form>
    
        <div class="hint-text"> New User? <a href="SignUpH.php" style="color:white;" >Sign Up Here</a></div>
    
        <div id="result"></div>
        </div>';

    
    }


    public function fetchSignUp()
    {

        echo '<div class="signup-form"> 

        <form method="post" style="margin-top:150px;">
            
         <h1>Sign Up</h1>
        
          <p id="p">Please fill in this form to create a new account.</p>
          <hr>
            <div class="text-left w-100 mb-4 ml-3">
                <p class="text-green h3 font-weight-bold text-uppercase">Create an Account</p>';

                
                if (isset($_SESSION['error'])) {
                    foreach ($_SESSION['error'] as $e) { ?>
                        <div class='alert alert-danger bar error close' data-dismiss = 'alert'>
                        <?php echo $e; ?>
                        </div>
                        <?php }
                } ?>
             <?php
              if (isset($_SESSION['confirm'])) {?>
                    <div class='alert alert-success bar success close' data-dismiss = 'alert'>
                    <?php echo $_SESSION['confirm']; ?>
                    </div>
                     <?php }
             



        echo '  </div>

        <div class="form-group">
                    <div class="row">
        
                <div class="col-xs-8">
                <input type="text" style="margin-left:13%;" placeholder="Enter Your First Name" name="firstname" class="form-control" required> </div>
                    </div>          
                </div>
        
             <div class="form-group">
        
             <input type="text" style="margin-left:13%;" placeholder="Enter Your Last Name" name="lastname" class="form-control" required>
        
             </div>
        
             <div class="form-group">
             <input type="email" style="margin-left:13%;" value = " " placeholder="Enter Email" name="email" class="form-control"required>
             </div>
        
            
            <div class="form-group">
            <input type="text" style="margin-left:13%;" placeholder="Enter Your Number" name="number" class="form-control" maxlength="11" required>
            </div>
        
        
            <div class="form-group">
            <input type="password" style="margin-left:13%;" placeholder="Enter Password" name="password" class="form-control" required>
            </div>
        
            <div class="form-group">
            <input type="password" style="margin-left:13%;" placeholder="Repeat Password" name="confirm_password" class="form-control" required>
            </div>
        
            <span id="message" ></span><br><br>
        
            <div class="form-group">
            Male<input type="radio" style="margin-left:5px;" name="gender" value="male" class="form-radio" required> 
            
            Female<input type="radio" style="margin-left:5px;" name="gender" value="female" class="form-radio" required> 
            </div>
        
        
            <div class="form-group">
            <label class="checkbox-inline"> <input type="checkbox" required>
            By creating an account you must agree our <a href="#">Terms & Privacy</a>.</label> 
            </div>
        
        
        
        
            <div class="form-group">
              <input type="Submit" value="Submit" name="register" class="btn btn-primary btn-lg">
            </div>
        
        
            </form>
        
        <div class="hint-text">Already have an account? <a href="SignInH.php">Login Here</a></div>
          
        </div>';
    }


public function fetchEditProfile()
{
    echo ''.$this->getprofile().'<div class="container bootstrap snippet" style="margin-top: 15%; margin-left: 15%;">

    <div class="row">
      <div class="col-sm-10" id="h" style = "margin-left: -50px;"><h1>Profile</h1></div>
    </div>
    <div class="row">

<form id="upload" action = "EditMyProfileH.php" method="post" enctype="multipart/form-data">
      <div class="col-sm-3"><!--left col-->
      <div class="picture-container">
        <div class="picture">
            
            <img src="img/personal-images/'.$this->getimg().'" class="picture-src" id="wizardPicturePreview" title="">
            
            <input type="file" id="wizard-picture" accept="image/*" name="image" required>
        </div>
        <h6 style = "margin-top: 10px;">Change Picture (max size 3Mb)</h6>
    </div><br>
   <input class="btn btn-lg btn-success"  id="up" type="submit" style = "margin-left: 105px; font-size:14px; font-family: Brush Script MT;" name="upload" value="Upload">
    </div>
</form>
  
        
<form class="form" method="post" style="margin-left:300px; margin-top:-280px; width:1000px;" id="info-Form">
      <div class="col-sm-9" id="c">
            <div class="tab-pane active" id="home">
                <div style = "margin-right: 200px;">';

                
                if (!empty($_SESSION['error'])) {
                    foreach ($_SESSION['error'] as $e) { ?>
                        <div class='alert alert-danger bar error' data-dismiss = 'alert'>
                        <?php echo $e; ?>
                        </div>
                        <?php }
                } ?>
             <?php
              if (!empty($_SESSION['confirm'])) {?>
                    <div class='alert alert-success bar success' style=" border: 1px solid #617c42;" data-dismiss = 'alert'>
                    <?php echo $_SESSION['confirm']; ?>
                    </div>
                     <?php }
             
               echo '</div>    
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="first_name" value = "'.$this->getfirstname().'"placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="last_name" value = "'.$this->getlastname().'" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="mobile" value ="'.$this->getnumber().'" id="mobile" placeholder="mobile number" title="enter your mobile number if any.">
                              
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="email"><h4>Email</h4></label>
                              <input type="email" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="email" value = "'.$this->getemail().'" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" value = "'.$this->getpassword().'" name="password" id="password" title="enter your password.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>New Password</h4></label>
                              <input type="password" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" value ="'.$this->getpassword().'" name="password2" id="confirm_password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <input name = "save" style = "font-size:14px; font-family: Brush Script MT;" class="btn btn-lg btn-success" id="s" type="submit">
                                <input type="submit" name = "deleteAccount" style = "font-size:14px; font-family: Brush Script MT; height:33px;" value = "Delete Account" class="btn btn-danger" >
                                <!--<input class="btn btn-lg" type="reset" value = "Reset">-->
                                <span id="message"></span>
                            </div>
                      </div>
                </div><!--/col-9-->
           </div><!--/tab-content-->
        </form>
    </div><!--/row-->
      </div>';
}

    
}