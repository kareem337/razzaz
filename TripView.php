<?php
require_once('TripModel.php');
class TripView extends TripModel
{
    public function fetchName()
    {
        print($this->getName());
    }

    public function fetchDescription()
    {
        print($this->getDescription());
    }

    public function fetchBackground()
    {
        print($this->getBackground());
    }

    public function fetchPrice()
    {
        print($this->getPrice());
    }

}