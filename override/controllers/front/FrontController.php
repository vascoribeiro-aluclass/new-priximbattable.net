<?php

/**
 *
 * @author Yassine Belkaid <yassine.belkaid87@gmail.com>
 */

class FrontController extends FrontControllerCore
{
    /**
     * Initializes common front page content: header, footer and side columns.
     */
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

        $this->assignGeneralPurposeVariables();
        $this->process();

        if (!isset($this->context->cart)) {
            $this->context->cart = new Cart();
        }

        $this->context->smarty->assign([
            'HOOK_HEADER' => Hook::exec('displayHeader'),
        ]);
    }

       public function setMedia()
    {
        $this->registerStylesheet('theme-main', '/assets/css/theme.css', ['media' => 'all', 'priority' => 50]);
        $this->registerStylesheet('theme-custom', '/assets/css/custom.css', ['media' => 'all', 'priority' => 1000]);
        $this->registerStylesheet('theme-aluclass', '/assets/css/newAlu.css', ['media' => 'all', 'priority' => 1001]);
        if ($this->context->language->is_rtl) {
            $this->registerStylesheet('theme-rtl', '/assets/css/rtl.css', ['media' => 'all', 'priority' => 900]);
        }

        $this->registerJavascript('corejs', '/themes/core.js', ['position' => 'bottom', 'priority' => 0]);
        $this->registerJavascript('theme-main', '/assets/js/theme.js', ['position' => 'bottom', 'priority' => 50]);
        $this->registerJavascript('theme-custom', '/assets/js/custom.js', ['position' => 'bottom', 'priority' => 1000]);

        $assets = $this->context->shop->theme->getPageSpecificAssets($this->php_self);
        if (!empty($assets)) {
            foreach ($assets['css'] as $css) {
                $this->registerStylesheet($css['id'], $css['path'], $css);
            }
            foreach ($assets['js'] as $js) {
                $this->registerJavascript($js['id'], $js['path'], $js);
            }
        }

        // Execute Hook FrontController SetMedia
        Hook::exec('actionFrontControllerSetMedia', []);

        return true;
    }
}
