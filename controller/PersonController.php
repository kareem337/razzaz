<?php
require_once('model/PersonModel.php');
class PersonController extends PersonModel
{
    public function loginC()
    {
        $this->login($_POST);
        $error = $this->get_errors_login_all();
        $confirm = $this->getConfirmLogin();
    }

    public function registerC()
    {
        $this->register($_POST);
    }

    public function savedataC()
    {
        $this->savedata($_POST);

    }

    public function editimgC()
    {
        $upload_pic = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"img/personal-images/".$upload_pic);
        $this->editimg($upload_pic);

    }
}
?>