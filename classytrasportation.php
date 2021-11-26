<?php

class Vehicle{
        //properties
        public $make;
        public $model;

        
        public $doors = 4;
        public $windows = 6;
        public $tires = 4;

        
        public $width;
        public $height;
        public $length;
        

        public $engine = [
            "horse_power" => 256,
            "cylinders" => 4,
            "fuel_type" => "Regular"
        ];
        public $drive_type = array(
            "front_wheel" => False, 
            "rear_wheel" => False,
            "all_wheel" => False,
            "four_wheel" => False,
        );
        
        public function __construct() {
        }
}

//class 1
class Chevy extends Vehicle{
        
        //new properties
        public $color;
        public $supported_colors = array();
        
        public function __construct() {
                parent::__construct();
                $this->make = "Cruze";
                $this->model = "Chevrolet";
                $this->color = "Silver";
                array_push($this->supported_colors, "Red", "Black", "Silver");

                
                $this->drive_type["front_wheel"] = True;
                $this->drive_type["rear_wheel"] = False;
                $this->drive_type["all_wheel"] = False;
                $this->drive_type["four_wheel"] = False;
        }
        
        //setter function to set color
        public function setColor($color){
                $this->color = $color;
        }
        
        
        public function showDetails(){
                echo "Make:" . $this->make . " Model:" . $this->model . " Color:" . $this->color . "\n";
        }
       
        
}

class Nissan extends Vehicle{
        public function __construct() {
                parent::__construct();
                $this->make = "Nissan";
                $this->model = "Maxima";
                $this->resetToBike();
        }
        
        //convert it to bike
        private function resetToBike(){
                $this->doors = 0;
                $this->windows = 0;
                $this->tires = 2;
        }
        
        //set engine details for bike
        public function setEngine($details){
                $this->engine["horse power"] = $details[0];
                $this->engine["cylinders"] = $details[1];
                $this->engine["fuel type"] = $details[2];
        }
        

        public function setDimensions($dimensions){
                $this->length = $dimensions[0];
                $this->width = $dimensions[1];
                $this->height = $dimensions[2];
        }
        
        //print details
        public function showDetails(){
                echo "Make:" . $this->make . " Model:" . $this->model . "\n";
                echo "Horse Power:" . $this->engine["horse power"] . " Cylinders:" . $this->engine["cylinders"] . " Fuel Type:" . $this->engine["fuel type"] . "\n";
        }
}

//creating instance of a car
$m = new Chevy();
echo "Initial Properties:\n";
$m->showDetails();
echo "+++++++++++++++++++++++++++++\n";
echo "New Properties:\n";
$m->setColor("Green");
$m->showDetails();
echo "+++++++++++++++++++++++++++++\n";

$d = new Nissan();
$d->setEngine(array(135, 4, "Regular"));
$d->setDimensions(array(2200, 880,1040));
$d->showDetails();
echo "+++++++++++++++++++++++++++++\n";
?>