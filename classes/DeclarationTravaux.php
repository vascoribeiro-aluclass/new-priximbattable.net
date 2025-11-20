<?php

use Alma\API\Entities\Order;
use LDAP\Result;

class DeclarationTravauxCore extends ObjectModel
{
    function __construct(){

    }
    public function sendMail($arrayDeclaration){

      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'declarationworks', // email template file to be use
        'Declaration de Travaux - '.$arrayDeclaration['ref'], // email subject
        array(
          '{linkzip}' => $arrayDeclaration['name_zip'],
          '{description}' => $arrayDeclaration['description'],
          '{ref}' => $arrayDeclaration['ref'],
          '{customer_name}' => $arrayDeclaration['customer_name'],
          '{customer_mail}' => $arrayDeclaration['customer_mail'],
        ),
        'info9.priximbattable@gmail.com',
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $arrayDeclaration['customer_name'], //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );

    }

    public function updateDeclaration($token,$description){

      $arrayDeclaration = array();

      $result_declaration_works = Db::getInstance()->executeS("SELECT id,`id_order` FROM `" . _DB_PREFIX_ . "declaration_works` where `token` = '".$token."'");
      $row_declaration_works = current( $result_declaration_works );
      if($row_declaration_works){

        Db::getInstance()->execute("DELETE  FROM `" . _DB_PREFIX_ . "declaration_works_img` where `id_declaration_works` = '".$row_declaration_works['id']."'");

        $arrayimgwroks = array();

        $arrayimgwroks['plans'] = DeclarationTravaux::uploadfile('plansprojetdt','plans');
        if(array_key_exists('error',$arrayimgwroks['plans'])){
          $arrayDeclaration['message'] = $arrayimgwroks['plans']['error'];
          $arrayDeclaration['status'] = 'error';
          return $arrayDeclaration;
        }
        $arrayimgwroks['graphic'] = DeclarationTravaux::uploadfile('insertiongraphiquedt','graphic');
        if(array_key_exists('error',$arrayimgwroks['graphic'])){
          $arrayDeclaration['message'] = $arrayimgwroks['graphic']['error'];
          $arrayDeclaration['status'] = 'error';
          return $arrayDeclaration;
        }
        $arrayimgwroks['photos'] = DeclarationTravaux::uploadfile('phototerraindt','photos');
        if(array_key_exists('error',$arrayimgwroks['photos'])){
          $arrayDeclaration['message'] = $arrayimgwroks['photos']['error'];
          $arrayDeclaration['status'] = 'error';
          return $arrayDeclaration;
        }

        $zip = new ZipArchive();
        $name_zip = DeclarationTravaux::generateToken(20);
        $name_complete_zip = $name_zip.".zip";
        $zip->open( _PS_IMG_DIR_."public/declarationtravaux/".$name_complete_zip , ZipArchive::CREATE);


        foreach($arrayimgwroks as $type => $imgs){
          foreach($imgs as $img){
            Db::getInstance()->execute("INSERT INTO `" . _DB_PREFIX_ . "declaration_works_img` (`type`,`name`,`id_declaration_works`) VALUES ('".$type."','".$img."','".$row_declaration_works['id']."')");
             $zip->addEmptyDir($type);
            $zip->addFile( _PS_IMG_DIR_."public/declarationtravaux/".$type."/".$img, $type."/".$img);
          }
        }
        $zip->close();

        Db::getInstance()->execute("UPDATE `" . _DB_PREFIX_ . "declaration_works` SET `description` = '".$description."', `zip` = '".$name_complete_zip."'   where `token` = '".$token."'");
        $arrayDeclaration['name_zip'] = str_replace('http://',(Configuration::get('PS_SSL_ENABLED') ? "https://" : "http://"),_PS_BASE_URL_)."/declaration-de-travaux?zip=".$name_zip;

        $result_order = Db::getInstance()->executeS("SELECT *FROM `" . _DB_PREFIX_ . "orders` where `id_order` = '".$row_declaration_works['id_order']."'");
        $row_order= current( $result_order );

        $arrayDeclaration['ref'] =  $row_order['reference'];
        $arrayDeclaration['description'] = $description;
        $customer = new Customer((int) $row_order['id_customer']);

        $arrayDeclaration['customer_name'] = $customer->firstname . ' ' . $customer->lastname;
        $arrayDeclaration['customer_mail'] = $customer->email;
        $arrayDeclaration['status'] = 'succes';
        $arrayDeclaration['message'] = 'Informations envoyées avec succès';

        return $arrayDeclaration;
      }
    }

    public static function generateToken($num){
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $varSize = strlen($chars);
      $token = "";

      for( $x = 0; $x < $num; $x++ ) {
          $tokenc = $chars[ rand( 0, $varSize - 1 ) ];
          $token .= $tokenc;
      }

      return  $token;
    }

    public static function generateRegistrationToken($id_order){


      $token = DeclarationTravaux::generateToken(50);

      Db::getInstance()->execute("INSERT INTO `" . _DB_PREFIX_ . "declaration_works` (`token`,`id_order`) VALUES ('".$token."','".$id_order."')");

      $link = str_replace('http://',(Configuration::get('PS_SSL_ENABLED') ? "https://" : "http://"),_PS_BASE_URL_)."/declaration-de-travaux?token=".$token;

      return  $link;
    }

    public static function uploadfile($filename,$past)
    {
      $arrayimg = array();
      $arrytypeimg = array("jpg", "png", "jpeg", "gif", "pdf");

      if (isset($_FILES[$filename]))
      {
        $numfiles = count($_FILES[$filename]["name"]);

        $target_dir = _PS_IMG_DIR_.'public/declarationtravaux/'.$past.'/';

        if (!file_exists($target_dir)) {
          mkdir($target_dir, 0777, true);
        }

        for($i = 0; $i < $numfiles;$i++){
          $message = '';
          $new_name = DeclarationTravaux::generateToken(20);

          $target_file = $target_dir . basename($_FILES[$filename]["name"][$i]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Check if image file is a actual image or fake image

          $check = getimagesize($_FILES[$filename]["tmp_name"][$i]);
          if($check !== false) {
            $uploadOk = 1;
          } else {
            $uploadOk = 0;
            $message = 'Erreur : Fichier non trouvé';
          }


          // Allow certain file formats
          if (!in_array(strtolower($imageFileType), $arrytypeimg)) {
            $uploadOk = 0;
            $message = 'Erreur : Le type de fichier n\'est pas pris en charge. Les fichiers jpg, png, jpeg, gif et pdf sont pris en charge.';
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            $arrayimg['error'] = $message;
            return  $arrayimg;
          }
          else
          {
            $new_name_img =  $new_name.".".$imageFileType;
            if (move_uploaded_file($_FILES[$filename]["tmp_name"][$i], $target_dir.$new_name.".".$imageFileType))
            {
              $arrayimg[] = $new_name_img;
            }
          }

        }

      }
      return  $arrayimg;
    }

}
