<?php


class HtmlMenu
{

  public function GetMenuCategoryDESTOCKAGE()
  {
    return '<a href="/101-bonnes-affaires" class="emphasis">
                    <li>DÉSTOCKAGE -50% et +</li>
                  </a>';
  }

  public function GetCategoryMoblieDESTOCKAGE()
  {
    return  '
        <div class="item-menu emphasis" >
          <a href="/101-bonnes-affaires">
           DÉSTOCKAGE -50% et +
        </div>

      ';
  }

  public function GetMenuCategory($link,$id,$name)
  {
    return '<a href="/'.$link.'" class="alumenu-item" data-target="'.$id.'">
              <li>'.$name.'</li>
            </a>';
  }

  public function GetParent($colSeize,$langid,$id,$link,$img,$name,$category,$withImg,$heightImg)
  {

    if (file_exists(_PS_IMG_DIR_ . 'alumenu/'.$langid.'/'.$category.'/'.$img.'.jpg') && file_exists(_PS_IMG_DIR_ . 'alumenu/'.$langid.'/'.$category.'/'.$img.'.webp')) {
      $htmlimg = '<picture>
                    <source srcset="/img/alumenu/'.$langid.'/'.$category.'/'.$img.'.webp" type="image/webp">
                    <img src="/img/alumenu/'.$langid.'/'.$category.'/'.$img.'.jpg" alt="'.$name.'"
                      class="img-fluid" loading="lazy" width="'.$withImg.'" height="'.$heightImg.'" />
                  </picture>';
    }else{
      $htmlimg = '<picture>
                    <img src="/img/c/'.$id.'.jpg" alt="'.$name.'" data-name-hidden="'.$img.'" class="img-fluid" loading="lazy" width="'.$withImg.'" height="'.$heightImg.'" />
                  </picture> ';
    }
    return '<div class="col-md-'.$colSeize.'">
              <a href="'.$link.'">
                 '.$htmlimg.'
               <span>'.$name.'</span>
              </a>
            </div>';
  }

  public function GetCategory($id,$parent)
  {
    return '
              <div id="'.$id.'" class="alumenu-sub-item hide-block">
                {include file="modules/alumenu/views/templates/hook/discount.tpl"}
                <div class="row">
                '.$parent.'
                </div>
              </div>';
  }

  public function GetMenu($category,$menuCategory,$moblieCategory)
  {
    return  '
    <section>
    '.$moblieCategory.'
      <div style="width: 100%;" id="alumenu">
        <div class="row">
          <div class="col-md-12">
            <div class="container">
              <div class="row custom-background-alumenu">
                <div class="col-md-12">
                  <div class="alumenu">
                  <ul>
                  '.$menuCategory.'
                  </ul>
                  '.$category.'
                  </div>
                </div>
              </div>
            </div>
            <div class="alumenu-overlay hide-block"></div>
          </div>
        </div>
      </div>
    </section>';
  }

  public function GetMenuMoblie($category)
  {
    return  '
    <div class="container-fluid" id="alumenu-mobile">
      <div class="load">
        <span class="material-icons">
          menu
        </span> MENU
      </div>

      <div class="items-menu">
        <div class="close-menu">
          <span class="material-icons">
            chevron_left
          </span> Retour
        </div>
        '.$category.'
      </div>
    </div>';
  }
  public function GetCategoryMoblie($id,$name,$parent)
  {
    return  '
        <div class="item-menu" data-target="mobile-'.$id.'">
        '.$name.'
        </div>
        <div id="mobile-'.$id.'" class="alumenu-mobile-sub-item">
          {include file="modules/alumenu/views/templates/hook/discount.tpl"}
          <div class="row">
          '.$parent.'
          </div>
        </div>
      ';

}

}
