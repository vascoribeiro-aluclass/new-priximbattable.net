<?php

class ComparatifCore extends ObjectModel
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function GettableFirst($xlsx)
    { 
        if ($xlsx) {

            $arraytemp = array();

            foreach($xlsx as $rowline){
                $i=0;
                foreach($rowline as $row){
                    $arraytemp[$i][] = $rowline[$i];
                    $i++;
                }
                
            }

            return $arraytemp;
        } else {
            return false;
        }
    }
    

    function ProductPriceSort($arr,$pos) {
        $size = count($arr);
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size-$i; $j++) {
                $k = $j+1;
                $priceOne = explode("::",$arr[$k][$pos]);
                $priceTwo = explode("::",$arr[$j][$pos]);
                if (intval($priceOne[1] ) < intval($priceTwo[1])) {
                    list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                }
            }
        }
        return $arr;
    }

    function ProductSort($arr,$pos) {
        $size = count($arr);
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size-$i; $j++) {
                $k = $j+1;
                $priceOne = $arr[$k][$pos];
                $priceTwo = $arr[$j][$pos];
                if(is_int($priceOne) || is_int($priceTwo)){
                    if (intval($priceOne) < intval($priceTwo)) {
                        list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                    }
                }else{
                    if ($priceOne < $priceTwo) {
                        list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                    }
                }

            }
        }
        return $arr;
    }

}
