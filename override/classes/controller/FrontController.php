<?php
class FrontController extends FrontControllerCore
{
    
    public function initContent()
    {
        $gclidV = Tools::getValue('gclid');
        if($gclidV){
          setcookie("PBCLID", $gclidV,time()+3600*24*90, '/');
          setcookie("PBCLKID_DATE", date('Y-m-d H:i:s'),time()+3600*24*90, '/');
          setcookie("PBCLKID_TYPE", 'GCLID',time()+3600*24*90, '/');
        }
        $fbclidV = Tools::getValue('fbclid');
        if($fbclidV){
        setcookie("PBCLID", $fbclidV,time()+3600*24*90, '/');
        setcookie("PBCLKID_DATE", date('Y-m-d H:i:s'),time()+3600*24*90, '/');
        setcookie("PBCLKID_TYPE", 'FBCLID',time()+3600*24*90, '/');
        }
        $msclkidV = Tools::getValue('msclkid');
        if($msclkidV){
          setcookie("PBCLID", $msclkidV,time()+3600*24*90, '/');
          setcookie("PBCLKID_DATE", date('Y-m-d H:i:s'),time()+3600*24*90, '/');
          setcookie("PBCLKID_TYPE", 'MSCLKID',time()+3600*24*90, '/');
        }
        if (Context::getContext()->customer->isLogged()){
          if (isset($_COOKIE["prix_wishlist"])) {
            $wishlist = new WishList();
            $wishlist->SetCookeiWishList($_COOKIE["prix_wishlist"]);
            unset($_COOKIE['prix_wishlist']);
            setcookie("prix_wishlist", "", time() - 15 * 24 * 60 * 60, "/");
          }
        }
        $wishlist = new WishList();
        $iswishlist = $wishlist->isWishList();
        $this->assignGeneralPurposeVariables();
        $this->process();
        if (!isset($this->context->cart)) {
            $this->context->cart = new Cart();
        }
        $curUrl = $this->context->link->getLanguageLink($this->context->language->id);
        $curUrl = ((isset(parse_url($curUrl)['query']) && parse_url($curUrl)['query']) ? str_replace(parse_url($curUrl)['query'], '', $curUrl) : $curUrl);
        $productsPrices = [];
        if ($this->getPageName() == 'index') {
            $productsPrices[0] = Product::getPriceStatic(1979, false, null, 2);
            $productsPrices[1] = Product::getPriceStatic(1127, false, null, 2);
            $productsPrices[2] = Product::getPriceStatic(215, false, null, 2);
            $productsPrices[3] = Product::getPriceStatic(358, false, null, 2);
            $productsPrices[4] = Product::getPriceStatic(3398, false, null, 2);
            $productsPrices[5] = Product::getPriceStatic(13356, false, null, 2);
            $productsPrices[6] = Product::getPriceStatic(828, false, null, 2);
            $productsPrices[7] = Product::getPriceStatic(3126, false, null, 2);
            $productsPrices[8] = Product::getPriceStatic(872, false, null, 2);
            $productsPrices[9] = Product::getPriceStatic(13441, false, null, 2);
        }
        $newnota = new Notas('notas');
        $notaGoogle = $newnota->GetNotaGoogle(1);
        $notaTrustpilot = $newnota->GetNotaTrustpilot(2);
        $notaPriximbattable = $newnota->GetNotaPriximbattable(3);
        $notaPagesJaunes = $newnota->GetNotaPagesJaunes(4);
        $this->context->smarty->assign(array(
            'HOOK_HEADER' => Hook::exec('displayHeader'),
            'iswishlist' =>  $iswishlist,
            'cur_current_url' => rtrim($curUrl, '?'),
            'chfCur' => new Currency(2),
            'products_prices' => $productsPrices,
            'notaGoogle' => $notaGoogle,
            'notaTrustpilot' => $notaTrustpilot,
            'notaPriximbattable' => $notaPriximbattable,
            'notaPagesJaunes' => $notaPagesJaunes,
        ));
    }
}
