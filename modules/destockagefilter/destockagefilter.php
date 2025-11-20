<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class DestockageFilter extends Module
{
    public function __construct()
    {
        $this->name = 'destockagefilter';
        $this->tab = 'front_office_features';
        $this->version = '1.7.0';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Filtro por Tags com AJAX');
        $this->description = $this->l('Adiciona um filtro lateral por tags com carregamento via AJAX.');
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayLeftColumn');
    }

    public function hookDisplayLeftColumn($params)
    {
        $currentCategory = $this->context->controller->getCategory();
        if (!Validate::isLoadedObject($currentCategory)) {
            return;
        }

        // Restrição só para as Subcategorias Destockage
        $allowedCategories = [309,310,311,312,313,314,315,316,317,318,319,320,321,126,51,52,53,24,25,97,34,35,37,83,84,183,32,111,85,20,23,106,21,108,117,55,56,65]; // Subcategorias

        if (!in_array((int)$currentCategory->id, $allowedCategories)) {
            return;
        }
        // Obter todas as tags usadas
        $allTags = Db::getInstance()->executeS("
          SELECT DISTINCT t.name
          FROM "._DB_PREFIX_."tag t
          INNER JOIN "._DB_PREFIX_."product_tag pt ON t.id_tag = pt.id_tag
          INNER JOIN "._DB_PREFIX_."product p ON pt.id_product = p.id_product
          INNER JOIN "._DB_PREFIX_."category_product cp ON p.id_product = cp.id_product
          WHERE cp.id_category = ".(int)$currentCategory->id."
          ORDER BY t.name ASC
        ");
        $tags = [];
        $alturas = [];
        $larguras = [];
        $cores = [];
        $ouverture = [];
        $longueur = [];
        $l_x_p = [];
        $profondeur = [];
        $larg_x_haut = [];
        $options = [];
        $toile = [];
        $l_x_l = [];
        $decors = [];
        $mesure = [];
        $resort = [];
        $vantaux = [];
        $verrieres = [];
        $fermetures = [];
        $tmj = [];
        $accessoire = [];
        $motorisation = [];
        $ressort = [];
        $disponibilite = [];
        $fixation = [];
        $nbvoiture = [];
        $habri = [];
        $typecarport = [];
        $sf = [];
        $lame = [];
        $toiture = [];
        $panneaux = [];
        $hublot = [];
        $portillon = [];
        $lxh = [];
        $remplissage = [];
        $forme = [];
        $pblxp = [];
        $epaisseur = [];
        $resistancethermique = [];
        $style = [];
        $typecloture = [];
        $typegardecorps = [];
        $fixationpoteaux = [];
        // foreach ($allTags as $tag) {//funciona tmb em regex
          //   // if (preg_match('/^hauteur\s*:\s*\d+\s*cm$/i', $tag['name'])) {
          //   //   $alturas[] = $tag;
          //   // } else if(preg_match('/^largeur\s*:\s*\d+([,.]\d+)?\s*M$/i', $tag['name'])){
          //   //   $larguras[] = $tag;
          //   // } else if(preg_match('/^(Gris Anthracite|Blanc)$/i', $tag['name'])){
          //   //   $cores[] = $tag;
          //   // } else if(preg_match('/^(Ajouré|Plein|Semi-Ajouré)$/i', $tag['name'])){
          //   //   $ouverture[] = $tag;
          //   // } else if(preg_match('/^longueur\s*:\s*\d+([,.]\d+)?\s*M(\s*-\s*\d+([,.]\d+)?\s*M)?$/i', $tag['name'])){
          //   //   $longueur[] = $tag;
          //   // } else if(preg_match('/^profondeur\s*:\s*\d+([,.]\d+)?\s*M(\s*-\s*\d+([,.]\d+)?\s*M)?$/i', $tag['name'])){
          //   //   $profondeur[] = $tag;
          //   // } else {
          //   //   // $tags[] = $tag;
          //   // }
          //   $tags[] = explode(":",$tag["name"]);
          //   // var_dump($tag_name[1]);
        // }
        foreach ($allTags as $tag) {
          $parts = explode(':', $tag['name'], 2); // divide a string em 2 -> prefixo:tagname

          if (count($parts) === 2) {
              $prefix = trim(mb_strtolower($parts[0])); // pega o valor atrás dos pontos e converte para minusculas para não haver erros de comparação no swtich
              $value = trim($parts[1]); //valor tag name

              switch ($prefix) { // serve para deferenciar como vai ser construido no tpl o filtro
                  case 'hauteur':
                      $alturas[] = ['name' => $value, 'full' => $tag['name']]; // tag names que vai para cada array, para depois no tpl serem apresentadas
                      break;
                  case 'largeur':
                      $larguras[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'longueur':
                      $longueur[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'profondeur':
                      $profondeur[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'lxp':
                      $l_x_p[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'lxl':
                      $l_x_l[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'largxhaut':
                      $larg_x_haut[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'couleur':
                      $cores[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'ouverture':
                      $ouverture[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'options':
                      $options[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'toile':
                      $toile[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'decors':
                      $decors[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'mesure':
                      $mesure[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'resort':
                      $resort[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'vantaux':
                      $vantaux[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'verrieres':
                      $verrieres[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'fermetures':
                      $fermetures[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'tmj':
                      $tmj[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'accessoire':
                      $accessoire[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'm':
                      $motorisation[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'ressort':
                      $ressort[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'disponibilite':
                      $disponibilite[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'fixation':
                      $fixation[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'nbvoiture':
                      $nbvoiture[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'habri':
                      $habri[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'typecarport':
                      $typecarport[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'sf':
                      $sf[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'lame':
                      $lame[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'toiture':
                      $toiture[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'panneaux':
                      $panneaux[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'hublot':
                      $hublot[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'portillon':
                      $portillon[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'lxh':
                      $lxh[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'remplissage':
                      $remplissage[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'forme':
                      $forme[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'pblxp':
                      $pblxp[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'epaisseur':
                      $epaisseur[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'resistancethermique':
                      $resistancethermique[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'style':
                      $style[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'typecloture':
                      $typecloture[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'typegardecorps':
                      $typegardecorps[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  case 'fixationpoteaux':
                      $fixationpoteaux[] = ['name' => $value, 'full' => $tag['name']];
                      break;
                  default:
                      $tags[] = ['name' => $value, 'prefix' => $prefix, 'full' => $tag['name']];
                      break;
              }
          } else {
              // Caso a tag não tenha ":" pode ir para outras
              $tags[] = ['name' => $tag['name']];
          }
        }
        //aqui é onde se verifica se os array estao vazios para que no lado da template, faz-se um if para não mostrar a categoria e as tags se o array for vazio
        if (empty($alturas)) {
          $alturas = [];
        }
        if (empty($larguras)) {
          $larguras = [];
        }
        if (empty($cores)) {
          $cores = [];
        }
        if (empty($ouverture)) {
          $ouverture = [];
        }
        if (empty($longueur)) {
          $longueur = [];
        }
        if (empty($profondeur)) {
          $profondeur = [];
        }
        if (empty($l_x_p)) {
          $l_x_p = [];
        }
        if (empty($l_x_l)) {
          $l_x_l = [];
        }
        if (empty($larg_x_haut)) {
          $larg_x_haut = [];
        }
        if (empty($options)) {
          $options = [];
        }
        if (empty($toile)) {
          $toile = [];
        }
        if (empty($decors)) {
          $decors = [];
        }
        if (empty($mesure)) {
          $mesure = [];
        }
        if (empty($resort)) {
          $resort = [];
        }
        if (empty($vantaux)) {
          $vantaux = [];
        }
        if (empty($verrieres)) {
          $verrieres = [];
        }
        if (empty($fermetures)) {
          $fermetures = [];
        }
        if (empty($tmj)) {
          $tmj = [];
        }
        if (empty($accessoire)) {
          $accessoire = [];
        }
        if (empty($motorisation)) {
          $motorisation = [];
        }
        if (empty($ressort)) {
          $ressort = [];
        }
        if (empty($disponibilite)) {
          $disponibilite = [];
        }
        if (empty($fixation)) {
          $fixation = [];
        }
        if (empty($nbvoiture)) {
          $nbvoiture = [];
        }
        if (empty($habri)) {
          $habri = [];
        }
        if (empty($typecarport)) {
          $typecarport = [];
        }
        if (empty($sf)) {
          $sf = [];
        }
        if (empty($lame)) {
          $lame = [];
        }
        if (empty($toiture)) {
          $toiture = [];
        }
        if (empty($panneaux)) {
          $panneaux = [];
        }
        if (empty($hublot)) {
          $hublot = [];
        }
        if (empty($portillon)) {
          $portillon = [];
        }
        if (empty($lxh)) {
          $lxh = [];
        }
        if (empty($remplissage)) {
          $remplissage = [];
        }
        if (empty($forme)) {
          $forme = [];
        }
        if (empty($pblxp)) {
          $pblxp = [];
        }
        if (empty($epaisseur)) {
          $epaisseur = [];
        }
        if (empty($resistancethermique)) {
          $resistancethermique = [];
        }
        if (empty($style)) {
          $style = [];
        }
        if (empty($typecloture)) {
          $typecloture = [];
        }
        if (empty($typegardecorps)) {
          $typegardecorps = [];
        }
        if (empty($fixationpoteaux)) {
          $fixationpoteaux = [];
        }

        $prioridade = 'inférieure ou égale à 9 m²';

        usort($sf, function($a, $b) use ($prioridade) {
          if ($a['name'] === $prioridade) return -1;
          if ($b['name'] === $prioridade) return 1;
          return strcmp($a['name'], $b['name']);
        });
        //pega o valor do preço maior do produto para aquela categoria (DESTOCKAGE)
        // $result = Db::getInstance()->getRow("
        //     SELECT ROUND(MAX(p.price) * 1.20,0) AS BiggestPrice FROM ps_product p JOIN ps_product_lang pl ON p.id_product = pl.id_product JOIN ps_category_product cp ON p.id_product = cp.id_product JOIN ps_category_lang cl ON cp.id_category = cl.id_category WHERE pl.id_lang = 1 AND cl.id_lang = 1 AND cl.name NOT LIKE '%Personnalisé%' AND p.id_category_default NOT IN (102) and p.active = 1
        // ");
        $result = Db::getInstance()->executeS("
            SELECT reduction as DescontoSite FROM ps_specific_price WHERE id_product = 0 AND id_customer = 0 AND NOW() BETWEEN `from` AND `to` ORDER BY id_specific_price");

        $countProducts = Db::getInstance()->getRow("
        SELECT COUNT(DISTINCT cp.id_product) AS total FROM ps_category_product cp JOIN ps_product p ON cp.id_product = p.id_product WHERE cp.id_category = ".(int)$currentCategory->id." AND p.active = 1");

        // $descontoSite = $result[0]["DescontoSite"];
        // * (1 - ".floatval($descontoSite).")
        $result_price = Db::getInstance()->executeS("
            SELECT ROUND(MAX(p.price * 1.20), 2) AS BiggestPrice FROM ps_product p
            JOIN ps_product_lang pl ON p.id_product = pl.id_product
            JOIN ps_category_product cp ON p.id_product = cp.id_product
            JOIN ps_category_lang cl ON cp.id_category = cl.id_category WHERE cp.id_category = ".(int)$currentCategory->id." and pl.id_lang = 1 AND cl.id_lang = 1 AND cl.name NOT LIKE '%Personnalisé%' AND p.id_category_default NOT IN (102) and p.active = 1
        ");

        $maxPrice = (float) $result_price[0]['BiggestPrice'];
        // var_dump(floatval($descontoSite));
        $this->context->smarty->assign([
            'tags' => $tags,
            'alturas' => $alturas,
            'larguras' => $larguras,
            'cores' => $cores,
            'ouverture' => $ouverture,
            'longueur' => $longueur,
            'profondeur' => $profondeur,
            'l_x_p' => $l_x_p,
            'l_x_l' => $l_x_l,
            'larg_x_haut' => $larg_x_haut,
            'options' => $options,
            'toile' => $toile,
            'decors' => $decors,
            'mesure' => $mesure,
            'resort' => $resort,
            'vantaux' => $vantaux,
            'verrieres' => $verrieres,
            'fermetures' => $fermetures,
            'tmj' => $tmj,
            'accessoire' => $accessoire,
            'motorisation' => $motorisation,
            'ressort' => $ressort,
            'disponibilite' => $disponibilite,
            'fixation' => $fixation,
            'nbvoiture' => $nbvoiture,
            'habri' => $habri,
            'typecarport' => $typecarport,
            'sf' => $sf,
            'lame' => $lame,
            'toiture' => $toiture,
            'panneaux' => $panneaux,
            'hublot' => $hublot,
            'portillon' => $portillon,
            'lxh' => $lxh,
            'remplissage' => $remplissage,
            'forme' => $forme,
            'pblxp' => $pblxp,
            'epaisseur' => $epaisseur,
            'resistancethermique' => $resistancethermique,
            'style' => $style,
            'typecloture' => $typecloture,
            'typegardecorps' => $typegardecorps,
            'fixationpoteaux' => $fixationpoteaux,
            'category_id' => (int)$currentCategory->id,
            'max_price' => $maxPrice
        ]);
        if((int)$countProducts['total'] > 4){
          return $this->display(__FILE__, 'views/templates/hook/displayLeftColumn.tpl');
        }
    }
}
