<?php
require_once('MuseumModel.php');
class MuseumView extends MuseumModel
{
    public function fetchMuseum()
    {
        echo"<div class='col-md-7 col-md-push-5' style='color: white;'>
        <div class='booking-cta'>
        <h1>".$this->getName()." </h1> 
            <p>".$this->getDescription()."</p>
        </div>
    </div>";
    }


    public function fetchBackground()
    {
        print($this->getBackground());
    }


    public function fetchForm()
    {
        echo"<form action='' method='POST'>
        <div>
            <h1>".$this->getPrice()." $ </h1>  <h5> &nbsp; per person</h5>
            <input type='hidden' name='price' value=".$this->getPrice().">
        </div>
        
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <span class='form-label'>Date</span>
                    <input class='form-control' name='date' type='date' id='currentDate' required>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <span class='form-label'>Persons</span>
                    <input type='number'  class='form-control' id='quantity' value='1' name='quantity' min='1'  required>
            
                </div>
            </div>
        </div>
        <div class='form-btn'>
            <button class='submit-btn' name='book'>BOOK</button>
        </div>
    </form>";
    }

}