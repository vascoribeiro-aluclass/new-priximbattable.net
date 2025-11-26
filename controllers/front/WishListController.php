<?php

class WishListControllerCore extends FrontController
{

    public $php_self = 'WishList';

    public function initContent()
    {

        $this->registerStylesheet('wishlistcss', '/assets/css/wishlist.css', ['media' => 'all', 'priority' => 1001]);
        $this->registerJavascript('wishlistjs', '/assets/js/wishlist.js', ['position' => 'bottom', 'priority' => 1001]);
        $this->wishlist = new WishList();

        $wishlistarray = $this->wishlist->GetWishList();

        $historiccartarray = $this->wishlist->GetHistoricCart();

        $countlist =  count($wishlistarray);
        $counthistoriccart =  count($historiccartarray);

        $this->context->smarty->assign(
          array(
            'wishlistarray' => $wishlistarray,
            'historiccartarray' => $historiccartarray,
            'countlist' => $countlist,
            'counthistoriccart' => $counthistoriccart,
            'isLogged' => Context::getContext()->customer->isLogged()
          )
        );

        parent::initContent();
        $this->setTemplate('wishlist');
    }

    public function displayAjaxDeleteProductWish()
    {
      $wishlistresult = false;

      $wishlist = new WishList();
      $wishlistresult = $wishlist->RemoveHistoricProductWishlist(Tools::getValue('idproduct'));

      $this->ajaxRender($wishlistresult);

      return;

    }

    public function displayAjaxSendMailProduct()
    {

      $linkproduct = Tools::getValue('linkproduct');
      $nomproduct = Tools::getValue('nomproduct');
      $name_linkcart = Tools::getValue('name_linkcart');
      $mail_linkcart = Tools::getValue('mail_linkcart');

      $context = Context::getContext();
      $customerName = $context->customer->lastname . ' ' . $context->customer->firstname;

      Mail::Send(
        (int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
        'shareproduct', // email template file to be use
        $customerName.' a envoyé un partage de produit.', // email subject
        array(
          '{nom}' => $customerName,
          '{nomproduct}' => $nomproduct,
          '{link}' => $linkproduct // email content
        ),
        $mail_linkcart,
        Configuration::get('PS_SHOP_EMAIL'), // receiver email address
        $name_linkcart, //receiver name
        NULL, //from email address
        NULL,  //from name
        NULL, //file attachment
        NULL, //mode smtp
      );

      return;
    }

    public function displayAjaxDetailProductShow()
    {
      $templateParams = array();


      $wishlist = new WishList();

      $templateParams = $wishlist->GetHistoricProductCart(Tools::getValue('idcart'));

      ob_end_clean();
      header('Content-Type: application/json');
      $this->ajaxRender(Tools::jsonEncode(array(
        'wishlist_detail' => $this->render(
            'wishlist_detail',
            $templateParams
        ),
      )));

      return;
    }

}
