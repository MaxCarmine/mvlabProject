<input type="button" name="home" value="Home" onClick="document.location.href='../index.html'"/><br>

<?php

include "../Read/form.php";
include "../Read/file.php";
include "../Read/db.php";
include "../Write/toScreen.php";
include "../Write/toFile.php";
include "../Write/toDb.php";
include "../Write/Calc/crescente.php";
include "../Write/Calc/calante.php";
include "../Write/Calc/lineare.php";


class Data{
    public $source;
    public $destinantion;
    public $pathDb;
    public $pathTable;
    public $myArray=[];
    public $preset=[];

    public function __construct()
    {

        $this->source=$_POST['source'];
        $this->destinantion=$_POST['destinantion'];
        
        if($this->destinantion=="toDb"){
            $this->pathDb=$_POST['dbd'];
            $this->pathTable=$_POST['tabled'];
            if($this->pathTable==""){
                $this->pathTable="Table";
            }
        }
       

        
        
        $this->loader($this->source);
        $this->writer($this->destinantion);
    }

    function loader($src){
        switch ($src) {
           
                case 'gen':
                    # it will fetch the data from the form and store it in an array
                    #i call the class form that listens for the form data
                    # IT WORKS 
                    #$this->array = ;
                    $this->myArray = (array) new ReadForm();
                   
                    break;
                case 'file':
                    # it will read the data from an exisitng file and store it in an a array or temporary csv file
                    #i call the class file that listens for the file
                    $this->myArray = (array) new ReadFile();
                    //var_dump($this->myArray);
                    break;
                case 'db':
                    # it will SELECT * FROM the selected db and store it in an array
                    #i call the class database that listens for the db params
                    $this->myArray= (array) new ReadDatabase();
                    
                    break;
                case 'preset':
                    # code...
                    break;
            default:
                # code...
                break;
        }

    }

    function writer($dest){
        switch($dest){
            case 'toScreen':
                $write = new Screen($this->myArray,$this->source);
                break;
            case 'toFile':
                $write = new File($this->myArray,$this->source);
                break;
            case 'toDb':
                $write = new Db($this->myArray,$this->source,$this->pathDb,$this->pathTable);
                break;
                        
        }

    }

}

$test =new Data();