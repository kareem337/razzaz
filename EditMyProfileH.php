<?php
session_start();
include("classes/User.php");
include("DB.php");
$editProfile = new Reserve();
$editProfile->getprofile();
if (isset($_POST['save'])) {
    $editProfile->savedata($_POST);
    $error = $editProfile->get_errors();
    $confirm = $editProfile->getConfirmEdit();
    #header("location: EditMyProfileH.php");
}
if(isset($_POST['upload'])){
    $upload_pic = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp,"img/personal-images/".$upload_pic);
    $editProfile->editimg($upload_pic);
    $error = $editProfile->get_errors();
    $confirm = $editProfile->getConfirmEdit();
    #header("location: EditMyProfileH.php");
}
if(isset($_POST['deleteAccount'])){
    $editProfile->deleteAccount();
    #header("location: EditMyProfileH.php");
}

?>

<!DOCTYPE html>

<html>
<head>
    
    <title>Edit Profile</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="EditProfile.css">
    
    <style>    
        
  .bar {
  /*padding: 10px;*/
  margin-left: 80px;
  margin-bottom: 5px;
  width: 430px;      
  border: 1px solid #ccc;
  text-align: center;      
  font-size:14px; 
  font-family: Brush Script MT;        
}
     
  .error {
  border: 1px solid #a33a3a;          
}    
     
  .success {
  border: 1px solid #617c42;
        
}     
     
 </style> 
    
</head>
<body style = "background: #668B91;">
    <?php
     include ('NavBarH.php');
  ?>
<div class="container bootstrap snippet" style="margin-top: 15%; margin-left: 15%;">

    <div class="row">
      <div class="col-sm-10" id="h" style = "margin-left: -50px;"><h1>Profile</h1></div>
    </div>
    <div class="row">

<form id="upload" action = "EditMyProfileH.php" method="post" enctype="multipart/form-data">
      <div class="col-sm-3"><!--left col-->
      <div class="picture-container">
        <div class="picture">
            
            <img src="<?php print('img/personal-images/'.$editProfile->getimg());?>" class="picture-src" id="wizardPicturePreview" title="">
            
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
                <div style = "margin-right: 200px;">
                <?php
                if (isset($error)) {
                    foreach ($error as $e) { ?>
                        <div class='alert alert-danger bar error' data-dismiss = 'alert'>
                        <?php echo $e; ?>
                        </div>
                        <?php }
                } ?>
             <?php
              if (isset($confirm)) {?>
                    <div  class='alert alert-success bar success' data-dismiss = 'alert'>
                    <?php echo $confirm; ?>
                    </div>
                     <?php }
             ?>
                </div>    
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="first_name" value = "<?php print($editProfile->getfirstname()); ?>" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="last_name" value = "<?php print($editProfile->getlastname()); ?>" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="mobile" value = "<?php print($editProfile->getnumber()); ?>" id="mobile" placeholder="mobile number" title="enter your mobile number if any.">
                              
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="email"><h4>Email</h4></label>
                              <input type="email" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" name="email" value = "<?php print($editProfile->getemail()); ?>" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" value = "<?php print($editProfile->getpassword()); ?>" name="password" id="password" title="enter your password.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>New Password</h4></label>
                              <input type="password" style = "font-size:14px; font-family: Brush Script MT;" class="form-control" value = "<?php print($editProfile->getpassword()); ?>" name="password2" id="confirm_password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <input name = "save" style = "font-size:14px; font-family: Brush Script MT;" class="btn btn-lg btn-success" id="s" type="submit">
                                <input type="submit" name = "deleteAccount" style = "font-size:14px; font-family: Brush Script MT; height:33px;" value = "Delete Account" class="btn btn-danger" >
                                <!--<input class="btn btn-lg" type="reset" value = "Reset">-->
                                <span id='message'></span>
                            </div>
                      </div>
                </div><!--/col-9-->
           </div><!--/tab-content-->
        </form>
    </div><!--/row-->
      </div>
</body>

</html>