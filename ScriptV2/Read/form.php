<?php

class ReadForm{
    public $name;
    public $avrage;
    public $variation;
    public $datei;
    public $datee;
    public $sample;
    public $type;
    public $unit;
    public $myArray =[];

    public function __construct()
    {
        $this->saveToArray();
    }


    public function saveToArray(){
        $this->name=$this->setName();
        $this->avrage=$this->setAvrage();
        $this->variation=$this->setVariation();
        $this->datei=$this->setDateI();
        $this->datee=$this->setDateE();
        $this->sample=$this->setCampione();
        $this->type=$this->setType();
        $this->unit=$this->setUnit();

        array_push($this->myArray, $this->name,$this->avrage,$this->variation,$this->datei,$this->datee,$this->sample,$this->type,$this->unit);

        return($this->myArray) ;


    } 

    protected function setName(){
        if (isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if (empty($name)){
            echo "Name is empty"."<br>";
        } else {
            return $name;
        }
    }

    protected function setAvrage(){
       
        if (isset($_POST['avrage'])){
            $avrage = $_POST['avrage'];
        }
        if (empty($avrage)){
            echo "avrage is empty"."<br>";
        } else {
            return $avrage;
        }
    }

    protected function setVariation(){
       
        if (isset($_POST['variation'])){
            $variation = $_POST['variation'];
        }
        if (empty($variation)){
            echo "variation is empty"."<br>";
        } else {
            return $variation;
        }
    }

    protected function setDateI(){
      
        if (isset($_POST['sdate'])){
            $sdate = $_POST['sdate'];
        }
        if (empty($sdate)){
            echo "sdate is empty"."<br>";
        } else {
            return $sdate;
        }
    }

    protected function setDateE(){
     
        if (isset($_POST['edate'])){
            $edate = $_POST['edate'];
        }
        if (empty($edate)){
            echo "edate is empty"."<br>";
        } else {
            return $edate;
        }
    }
    /*
    protected function setTimeI(){
      
        if (isset($_POST['sdate'])){
            $sdate = $_POST['sdate'];
        }
        if (empty($sdate)){
            echo "sdate is empty"."<br>";
        } else {
            return $sdate;
        }
    }

    protected function setE(){
     
        if (isset($_POST['edate'])){
            $edate = $_POST['edate'];
        }
        if (empty($edate)){
            echo "edate is empty"."<br>";
        } else {
            return $edate;
        }
    }*/

    protected function setCampione(){
        if (isset($_POST['sample'])){
            $sample = $_POST['sample'];
        }
        if (empty($sample)){
            echo "sample is empty"."<br>";
        } else {
            return $sample;
        }
    }

    protected function setUnit(){
      
        if (isset($_POST['unit'])){
            $unit = $_POST['unit'];
        }
        if (empty($unit)){
            echo "unit is empty"."<br>";
        } else {
            return $unit;
        }
    }

    protected function setType(){
      
        if (isset($_POST['type'])){
            $type = $_POST['type'];
        }
        if (empty($type)){
            echo "type is empty"."<br>";
        } else {
            return $type;
        }
    }
}