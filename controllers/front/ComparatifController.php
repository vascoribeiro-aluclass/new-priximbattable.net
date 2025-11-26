<?php


class ComparatifControllerCore extends FrontController
{
    protected $product;
    protected $compara;
    protected $posPrix;
    protected $posImg;
    public $php_self = 'comparatif';

    public function initContent()
    {
        $ctg_id = (int) Tools::getValue('ctg');

        $order = Tools::getValue('order');

        $this->compara = new Comparatif('asdasd');

        $arrayTable = array();

        $excel = SimpleXLSX::parse($_SERVER['DOCUMENT_ROOT'].'/excel_compare/'.$ctg_id.'.xlsx');

        if($excel){
            $arrayTable = $excel->rows();
            $arrayTable = $this->compara->GettableFirst($arrayTable);
            for($c=0 ;  $c < count($arrayTable);$c++){
                for($i=0 ;  $i < count($arrayTable[$c]);$i++){
                    $checkprice = strpos($arrayTable[$c][$i], 'prix::');
                    if ($checkprice === false){

                    }else{
                        $posPrix = $i;
                        $arrayPrix = explode("::", $arrayTable[$c][$i]);
                        $this->product = new Product($arrayPrix[1], true, 1, 1);
                        $portesarray = AluclassCarrier::getCarrierBeginPrice($arrayPrix[1]);
                        $price = $this->product->price;
                        $portes = 0;
                        $portesDesc = 0;
                        if($portesarray['free_shipping']){
                            $portes = ceil(($portesarray['porteprice']*("1.".$this->product->tax_rate)))/0.60;
                        }elseif($portesarray['half_free_shipping']){
                          $portes = ((($portesarray['porteprice'] - $portesarray['show_price'])*("1.".$this->product->tax_rate)))/0.7;
                        }

                       $Desconto = $this->product->checaDescontosCatalogo($this->product->id_category_default,$this->product->id );
                        if(count($Desconto)>0){
                            $desc_reb = 100-$Desconto["reduction_value"];
                            $portesDesc = ($portes*("0.".$desc_reb));

                            $arrayTable[$c][$i] =  number_format((float)round((($price *("1.".$this->product->tax_rate)))/("0.".$desc_reb)+$portes, 0,PHP_ROUND_HALF_UP), 2, '.', '')."::".number_format((float)round((($price*("1.".$this->product->tax_rate)))+$portesDesc, 2), 2, '.', '')."::".$Desconto["reduction_value"];
                        }else{
                            $arrayTable[$c][$i] =  number_format((float)round(($price *("1.".$this->product->tax_rate))+$portes, 0,PHP_ROUND_HALF_UP), 2, '.', '')."::".number_format((float)round(($price*("1.".$this->product->tax_rate))+$portes, 2), 2, '.', '');
                        }
                    }
                    $checkimg = strpos($arrayTable[$c][$i], 'img::');
                    if ($checkimg === false){

                    }else{
                        $posImg = $i;
                        $arrayImg = explode("::", $arrayTable[$c][$i]);
                        $this->product = new Product($arrayImg[1], true, 1, 1);
                        $arrImg = Product::getCover($arrayImg[1]);

                        $arrayTable[$c][$i] = "https://cdn-fr.priximbattable.net/".$arrImg['id_image']."-home_default/".$this->product->link_rewrite.".jpg";
                    }

                    $checklink = strpos($arrayTable[$c][$i], 'link::');
                    if ($checklink === false){

                    }else{
                        $posLink = $i;
                        $arrayLink = explode("::", $arrayTable[$c][$i]);
                        $this->product = new Product($arrayLink[1], true, 1, 1);

                        $arrayTable[$c][$i] = $this->product->getLink();
                    }
                    $checkflag = strpos($arrayTable[$c][$i], 'flag::');
                    if ($checkflag === false){

                    }else{
                        $posFlag  = $i;

                        $flagName = explode('::',$arrayTable[$c][$i]);

                        switch ( $flagName[1] ){
                            case 'portugal':
                                $arrayTable[$c][$i] = "spriteComparatifflagEUPT";
                            break;
                            case 'china':
                                $arrayTable[$c][$i] = "spriteComparatifflagCH";
                            break;
                            default:
                            $arrayTable[$c][$i] = "spriteComparatifflagEUPT";
                        }

                    }

                    $checkTrans = strpos($arrayTable[$c][$i], 'PORT::');
                    if ($checkTrans === false){

                    }else{
                        $posTras  = $i;

                        $arrayTras= explode("::", $arrayTable[$c][$i]);
                        $portesarray = AluclassCarrier::getCarrierBeginPrice($arrayTras[1]);
                        $this->product = new Product($arrayTras[1], true, 1, 1);
                        $portes = ($portesarray['porteprice']*("1.".$this->product->tax_rate));//(($portesarray['porteprice']*("1.".$this->product->tax_rate)))/0.67;
                        $portes = number_format((float)$portes, 2, '.', '');
                         if($portesarray['free_shipping']){
                          $arrayTable[$c][$i] = 'PORT::OUI::'.$portes;
                         }else{
                          $arrayTable[$c][$i] = 'PORT::NON::'.$portes;
                         }

                    }
                }
            }

            $arraydelete_line = array();

            $arrayTablefrist[0] = $arrayTable[0];

            $posOrder = -1;
            foreach($arrayTablefrist[0] as $key=>$row){
                if (strpos($row, "{OCULTE}") !== false ) {
                    $arraydelete_line[] = $key;
                    $orderCode = explode("::", $row);
                    if($order == $orderCode[1]){
                        $posOrder = $key;
                    }
                }
            }
            unset($arrayTable[0]);
            if($posOrder > -1 ){
                $arrayTable = $this->compara->ProductSort($arrayTable,$posOrder);
            }else{
                $arrayTable = $this->compara->ProductPriceSort($arrayTable,$posPrix);
                $order = 'TP';
            }

            $arrayTable = array_merge($arrayTablefrist,$arrayTable);
            $arrayTable = $this->compara->GettableFirst($arrayTable);

            foreach($arraydelete_line as $row){
                unset ($arrayTable[$row]);
            }

        }

        $arraySelectFilter = array(
            "TP" => "Prix",
            "DESIGN" => "Design de portail",
            "DECOR" => "Décor",
            "HAUTEUR" => "Hauteur",
        );

        // print_r('<pre>');
        // print_r($arrayTable);
        // print_r('</pre>');
        // exit;
        $this->context->smarty->assign(
            array(
                'Comptable' => $arrayTable,
                'posPrix' => $posPrix,
                'posImg' => $posImg,
                'posLink' => $posLink,
                'posFlag' => $posFlag,
                'posTras' => $posTras,
                'arraySelectFilter' => $arraySelectFilter,
                'arraySelectFilterkey' => array_keys($arraySelectFilter),
                'ctg_id' => $ctg_id,
                'order' => $order,
            )
        );

        parent::initContent();
        $this->setTemplate('comparatif');
    }
}
