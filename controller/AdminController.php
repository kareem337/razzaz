<?php
    require_once('model/AdminModel.php');
    class AdminController extends AdminModel
    {
        public function saveTrip()
        {
            $tname = $_POST['tname'];
            $tloc = $_POST['tloc'];
            $tprice = $_POST['tprice'];
            $tdesc = $_POST['tdesc'];
            $tpic = $_POST['tpic'];
            $this->addTrip($tname,$tloc,$tprice,$tdesc,$tpic);
            echo "<script>alert('updated succsesfuly')</script>";
        }
    }
?>