<?php


/*
this class in child of no one, the objetc Crescente get created only whene there is a calculation needed, it only know whats its given and noting else
*/
ini_set('memory_limit', '2048M');
class Calante{
    //time variables for the calculation
    private $seconds = 86400;
    private $minutes = 1440;
    private $houres = 24;
    private $days = 1;
    private $months = 30;
    private $year = 365;
    
    

    
    

    public function  Output($timeToAdd,$dateI,$dateE,$consumo,$variazione,$misura,$char){
        $valore=0;
        $array=[];
        $start=new DateTime($dateI);
        $end=new DateTime($dateE);
        while($start<=$end){
            
            $valore=$valore- $this->calculator($consumo,$variazione,$char);
            $start->add(new DateInterval($timeToAdd));
            //echo date_format($start, 'Y-m-d | H:i:s')."  |  ".number_format(($valore/$divMol),4,'.',' ')."  |  ".$misura."<br>";
            array_push( $array,date_format($start, 'Y-m-d H:i:s')."|".$valore."|".$misura);
        }
        return($array);
        
    }

    
    
    //this function accepts the Consumption=eg 3000, the variation=eg 200, the unit of measurmnet=eg kW, and a charater, and depending on the char=eg m(minuts) it will choose what type of calculation it will do
    private function calculator($cons,$variation,$char){
        switch ($char) {
            case 's':
                return $this->calcDiv($cons,$variation,$this->seconds);
                break;
            case 'm':
                return $this->calcDiv($cons,$variation,$this->minutes);
                break;
            case 'o':
                return $this->calcDiv($cons,$variation,$this->houres);
                break;
            case 'G':
                return $this->calcMol($cons,$variation,$this->days);
                break;
            case 'M':
                return $this->calcMol($cons,$variation,$this->months);
                break;
            case 'Y':
                return $this->calcMol($cons,$variation,$this->year);
                break;
                                                    
            default:null;
                
        }
    }
    //this function find what measurments has been chooesed and deping on what it is, it will return the value witch will me moltiplid by 
    
    

    //this is for the calculation if the time sample is seconds, minutes, hourse
    private function calcDiv($cons,$variation,$timeUnit){
        $cons=($cons)/$timeUnit;
        $variation=($variation)/$timeUnit;
        $decider= rand(1,2);
        if($decider==1){
            $result=$cons+$variation;
            return $result;
        }else{
            $var1=$cons-$variation;
            return $var1;
        } 
    }
    
    //this is for the calculation if the time sample is days, months, weeks    (maybe should add weeks ?)
    private function calcMol($cons,$variation,$timeUnit){
        $cons=($cons)*$timeUnit;
        $variation=($variation)*$timeUnit;
        $decider= rand(1,2);
        if($decider==1){
            $result=$cons+$variation;
            return $result;
        }else{
            $var1=$cons-$variation;
            return $var1;
        } 
    }      
        
    
}