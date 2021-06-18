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
            $tbackground = $_POST['tbackground'];
            $this->addTrip($tname,$tloc,$tprice,$tdesc,$tpic,$tbackground);
        }

        public function deleteTrip()
        {
            $trip_id = $_GET['delete'];
            $this->removeTrip($trip_id);
           
        }
        public function edittrips()
        {
            $name = $_POST['name'];
            $location = $_POST['location'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $id = $_SESSION['ID'];
            $background = $_POST['background'];
            $this->Updatetrips($id,$location,$name,$price,$description,$image,$background);
          
        }
        public function display()
        {     
             $editId = $_GET['editId'];
             return $this->displayTripById($editId);
        }
        public function savemuseum()
        {
            $tname = $_POST['tname'];
            $tloc = $_POST['tloc'];
            $tprice = $_POST['tprice'];
            $tdesc = $_POST['tdesc'];
            $tpic = $_POST['tpic'];
            $tbackground = $_POST['tbackground'];
            $this->addmuseum($tname,$tloc,$tprice,$tdesc,$tpic,$tbackground);
        }
        public function deletemuseum()
        {
            $trip_id = $_GET['delete'];
            $this->removemuseum($trip_id);
           
        }
        

    }
?>