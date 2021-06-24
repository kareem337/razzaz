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
            $category = $_POST['categ'];

            if($category == 2) {
                $this->UpdateMuse($id,$location,$name,$price,$description,$image,$background);
            } else if($category == 1) {
                $this->Updatetrips($id,$location,$name,$price,$description,$image,$background);
            }
            
          
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
        public function edituserstypes()
        {
            $user_id = $_GET['id'];
            $userTid = $_GET['type'];
            $this->editRecords($user_id,  $userTid);
        }
        public function deleteusers()
        {
            $user_id = $_GET['delete'];
            $this->deletRecords($user_id);
        }

       public function usercount()
       {
          return $this-> getUsersCount();
       }
       public function ordercount()
       {
          return $this-> getOrdersCount();
       }
       public function enquiriescount()
       {
          return $this->  getEnquiriesCount();
       }
       public function museumscount()
       {
          return $this-> getMuseumsCount();
       }
       public function tripscount()
       {
          return $this-> getTripsCount();
       }
       

    }
?>