<?php


class ReadDatabase{
    
    
    public $array;
    public $method="POST";
    public $baseurl='http://localhost:8086/query?db=';
    public $dbname;
    public $auth='&u=admin&p=1234&q=';
    public $queryurl='SELECT%20*%20FROM%20';
    public $tabelename;

    public function __construct()
    {
        $this->objectToArray();
    }


    public function objectToArray(){
        $this->dbname=$this->setDb();
        $this->tabelename=$this->setTabele();
        $this->array = $this->callAPIQueryDb($this->method,$this->baseurl,$this->dbname,$this->auth,$this->queryurl, $this->tabelename);
        return $this->array;
    }

    function callAPIQueryDb($method,$baseurl,$dbname,$auth,$queryurl,$tabelname){
        $curl = curl_init();
        
        $url=$baseurl.$dbname.$auth.$queryurl.$tabelname;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS =>' '
        ));
      
        $response = curl_exec($curl);

        curl_close($curl);
        $obj=json_decode($response);
        $arr=$obj->results[0]->series[0]->values;
        return $arr;
      }

    public function setDb(){
        if (isset($_POST['dbs'])){
            $name = $_POST['dbs'];
        }
        if (empty($name)){
            echo "db is empty"."<br>";
        } else {
            return $name;
        }
    }

    public function setTabele(){
        if (isset($_POST['table'])){
            $name = $_POST['table'];
        }
        if (empty($name)){
            echo "table is empty"."<br>";
        } else {
            return $name;
        }
    }
}


