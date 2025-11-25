<?php

class Category extends CategoryCore
{
    public function botaoCategoriaParaBlog($idCategoria) {
      $link = '';
      $arrayIds = array(
        '50' => 'quel-portail-alu-choisir-n79',
        '6' => 'quel-cloture-choisir-pour-mon-jardin--n117',
        '7' => 'motorisation-portail-laquelle-choisir--n76',
        '8' => 'carport-ou-garage-quelles-differences-comment-choisir-n24',
        '9' => 'apporter-de-la-lumiere-dans-la-maison-tout-ce-quil-faut-savoir-n6',
        '10' => 'tout-savoir-sur-les-differentes-poses-de-fenetre-coulissante-n7',
        '11' => 'comment-choisir-sa-porte-d-entree-n90',
        '12' => 'apporter-de-la-lumiere-dans-la-maison-tout-ce-quil-faut-savoir-n6',
        '13' => 'quelle-pergola-choisir--n68',
        '48' => 'que-choisir-comme-carport-n20',
        '57' => 'comment-embellir-votre-jardin-avec-du-gabion-n11',
        '105' => 'comment-fermer-une-pergola-alu--n65'
      );

      $total = count($arrayIds);
      foreach ($arrayIds as $key => $value) {
        if ($key != $idCategoria) {
          $total = $total - 1;
        } else {
          $link = $value;
        }
      }

      $retorno['total'] = $total;
      $retorno['link'] = "https://".$_SERVER['SERVER_NAME']."/blog/".$link;

      return $retorno;
    }
}
