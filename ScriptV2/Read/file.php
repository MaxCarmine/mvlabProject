<?php


class ReadFile{
    public $array=[];
    public function __construct()
    {
        $this->setFile();
        $this->fileToArray();
    }

    public function fileToArray(){
        $fileName=$_FILES['csv']['name'];
        $this->array = explode("\n", file_get_contents("./csv/$fileName"));
        return $this->array;
        //echo "<pre/>";print_r($array); this will help for the writer function that writes from csv to the screen
    }

    /*
    public function fileToFile(){
        $fileName=$_FILES['csv']['name'];
        $open=fopen($fileName,"r");
        
    }*/




    public function setFile(){
        
        if (isset($_FILES['csv'])){

            $wv = $_FILES['csv']['name'];

            $errors= array();
            $file_name = $_FILES['csv']['name'];
            $file_tmp = $_FILES['csv']['tmp_name'];
            $file_type = $_FILES['csv']['type'];
            strtolower(end(explode('.',$wv)));
    
        
            if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"csv/".$file_name);
            echo "Success"."<br>";
            }else{
            print_r($errors);
            }
        }
    }



}