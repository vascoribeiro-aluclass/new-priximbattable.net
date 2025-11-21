<?php
session_start();
include_once 'phpmailer/class.phpmailer.php';

//$bdd = new PDO('mysql:host=localhost;dbname=sav;charset=utf8', 'root', 'T9trXfww');
// $bdd = new PDO('mysql:host=127.0.0.1;dbname=devpriximbattfr;charset=utf8;port=3306', 'devpriximbattfr', 'V9kEV3vHp9n4');
$bdd = new PDO('mysql:host=127.0.0.1;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');
$nbrep = 1; //Nombre de repertoire photos
$nbimg = 10; //Nombre de repertoire photos
$extensions_ok = array("jpg", "gif", "png", "jpeg", "pdf", "doc", "docx");
$target1     = "./doc/";  // Repertoire cible
$aspect1 = 1;

$targetoriginal     = "./doc/";  // Repertoire cible

?>
<!doctype html>
<html lang="fr">

<head>


  <meta charset="utf-8">


  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <style>
    body {
      padding: 0px;
    }

    .titre {
      padding: 10px;
      background-color: red;
      color: #FFF;
      font-family: Arial;
      font-size: 17p;
      text-transform: uppercase;
    }
  </style>

  <title>Déclarer un SAV</title>
  <script src="https://www.google.com/recaptcha/api.js?render=6LfvN2EbAAAAAHqO9g6sRHA0Z05EX2a9blpPCIdB"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    grecaptcha.ready(function() {
      // do request for recaptcha token
      // response is promise with passed token
      grecaptcha.execute('6LfvN2EbAAAAAHqO9g6sRHA0Z05EX2a9blpPCIdB', {
          action: 'validate_captcha'
        })
        .then(function(token) {
          // add token value to form
          document.getElementById('g-recaptcha-response').value = token;
        });
    });
  </script>
  <script data-keepinline="true">
    /* datalayer */
    dataLayer = [];
    dataLayer.push({
      "pageCategory": "cms",
      "ecommerce": {
        "currencyCode": "EUR"
      },
      "google_tag_params": {
        "ecomm_pagetype": "other"
      }
    });
    /* call to GTM Tag */
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NNVWQF');

    /* async call to avoid cache system for dynamic data */
    var cdcgtmreq = new XMLHttpRequest();
    cdcgtmreq.onreadystatechange = function() {
      if (cdcgtmreq.readyState == XMLHttpRequest.DONE) {
        if (cdcgtmreq.status == 200) {
          var datalayerJs = cdcgtmreq.responseText;
          try {
            var datalayerObj = JSON.parse(datalayerJs);
            dataLayer = dataLayer || [];
            dataLayer.push(datalayerObj);
          } catch (e) {
            console.log("[CDCGTM] error while parsing json");
          }

        }
        dataLayer.push({
          'event': 'datalayer_ready'
        });
      }
    };
    cdcgtmreq.open("GET", "//priximbattable.net/module/cdc_googletagmanager/async" /*+ "?" + new Date().getTime()*/ , true);
    cdcgtmreq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    cdcgtmreq.send();
  </script>
  <meta name="description" content="Nos conditions de livraison">
  <meta name="keywords" content="conditions, livraison, délais, expédition, colis">
  <meta name="robots" content="noindex">

  <link rel="alternate" href="https://priximbattable.net/content/1-livraison" hreflang="fr">




  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="icon" type="image/vnd.microsoft.icon" href="/img/favicon.ico?1547030832">
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico?1547030832">



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" type="text/css" media="all">
  <link rel="stylesheet" href="https://priximbattable.net/themes/classic/assets/cache/theme-d43bd53925.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://priximbattable.net/modules/alumenu/views/css/alumenu.css" type="text/css" media="all">
  <!-- <link rel="stylesheet" href="https://priximbattable.net/themes/classic/assets/css/theme.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://priximbattable.net/themes/classic/assets/css/custom.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://priximbattable.net/themes/classic/assets/css/error.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://priximbattable.net/themes/classic/assets/css/newAlu.css" type="text/css" media="all">
  <link rel="stylesheet" href="https://priximbattable.net/sav/css/styles.css" type="text/css" media="all"> -->


  <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>


  <script type="text/javascript">
    var WK_PWA_APP_PUBLIC_SERVER_KEY = "BLrOTk_XXpPetaYZSAgdKT3Eo3jA5h5-o2UT05vVJicxYIQdp9tNMa_oNK8pkSY1acyVacm6cg6ByseExvG1bqA";
    var WK_PWA_PUSH_NOTIFICATION_ENABLE = 1;
    var appOffline = "Pas de connection";
    var appOnline = "Connect\u00e9";
    var clientTokenUrl = "https:\/\/priximbattable.net\/module\/wkpwa\/clientnotificationtoken";
    var customizeText = "Personnaliser";
    var jolisearch = {
      "amb_joli_search_action": "https:\/\/priximbattable.net\/jolisearch",
      "amb_joli_search_link": "https:\/\/priximbattable.net\/jolisearch",
      "amb_joli_search_controller": "jolisearch",
      "blocksearch_type": "top",
      "show_cat_desc": 0,
      "ga_acc": 0,
      "id_lang": 1,
      "url_rewriting": 1,
      "use_autocomplete": 1,
      "minwordlen": 3,
      "l_products": "Nos produits",
      "l_manufacturers": "Nos marques",
      "l_categories": "Nos cat\u00e9gories",
      "l_no_results_found": "Aucun produit ne correspond \u00e0 cette recherche",
      "l_more_results": "Montrer tous les r\u00e9sultats \u00bb",
      "ENT_QUOTES": 3,
      "search_ssl": true,
      "self": "\/core\/data\/priximbattable.net\/modules\/ambjolisearch"
    };
    var prestashop = {
      "cart": {
        "products": [],
        "totals": {
          "total": {
            "type": "total",
            "label": "Total",
            "amount": 0,
            "value": "0,00\u00a0\u20ac"
          },
          "total_including_tax": {
            "type": "total",
            "label": "Total TTC",
            "amount": 0,
            "value": "0,00\u00a0\u20ac"
          },
          "total_excluding_tax": {
            "type": "total",
            "label": "Total HT :",
            "amount": 0,
            "value": "0,00\u00a0\u20ac"
          }
        },
        "subtotals": {
          "products": {
            "type": "products",
            "label": "Sous-total",
            "amount": 0,
            "value": "0,00\u00a0\u20ac"
          },
          "discounts": null,
          "shipping": {
            "type": "shipping",
            "label": "Livraison",
            "amount": 0,
            "value": "gratuit"
          },
          "tax": null
        },
        "products_count": 0,
        "summary_string": "0 articles",
        "vouchers": {
          "allowed": 1,
          "added": []
        },
        "discounts": [],
        "minimalPurchase": 0,
        "minimalPurchaseRequired": ""
      },
      "currency": {
        "name": "euro",
        "iso_code": "EUR",
        "iso_code_num": "978",
        "sign": "\u20ac"
      },
      "customer": {
        "lastname": null,
        "firstname": null,
        "email": null,
        "birthday": null,
        "newsletter": null,
        "newsletter_date_add": null,
        "optin": null,
        "website": null,
        "company": null,
        "siret": null,
        "ape": null,
        "is_logged": false,
        "gender": {
          "type": null,
          "name": null
        },
        "addresses": []
      },
      "language": {
        "name": "Fran\u00e7ais (French)",
        "iso_code": "fr",
        "locale": "fr-FR",
        "language_code": "fr",
        "is_rtl": "0",
        "date_format_lite": "d\/m\/Y",
        "date_format_full": "d\/m\/Y H:i:s",
        "id": 1
      },
      "page": {
        "title": "",
        "canonical": null,
        "meta": {
          "title": "Livraison",
          "description": "Nos conditions de livraison",
          "keywords": "conditions, livraison, d\u00e9lais, exp\u00e9dition, colis",
          "robots": "noindex"
        },
        "page_name": "cms",
        "body_classes": {
          "lang-fr": true,
          "lang-rtl": false,
          "country-FR": true,
          "currency-EUR": true,
          "layout-full-width": true,
          "page-cms": true,
          "tax-display-enabled": true,
          "cms-id-1": true
        },
        "admin_notifications": []
      },
      "shop": {
        "name": "priximbattable",
        "logo": "\/img\/priximbattable-logo-1547030832.jpg",
        "stores_icon": "\/img\/logo_stores.png",
        "favicon": "\/img\/favicon.ico"
      },
      "urls": {
        "base_url": "https:\/\/priximbattable.net\/",
        "current_url": "https:\/\/priximbattable.net\/content\/1-livraison",
        "shop_domain_url": "https:\/\/priximbattable.net",
        "img_ps_url": "https:\/\/priximbattable.net\/img\/",
        "img_cat_url": "https:\/\/priximbattable.net\/img\/c\/",
        "img_lang_url": "https:\/\/priximbattable.net\/img\/l\/",
        "img_prod_url": "https:\/\/priximbattable.net\/img\/p\/",
        "img_manu_url": "https:\/\/priximbattable.net\/img\/m\/",
        "img_sup_url": "https:\/\/priximbattable.net\/img\/su\/",
        "img_ship_url": "https:\/\/priximbattable.net\/img\/s\/",
        "img_store_url": "https:\/\/priximbattable.net\/img\/st\/",
        "img_col_url": "https:\/\/priximbattable.net\/img\/co\/",
        "img_url": "https:\/\/priximbattable.net\/themes\/classic\/assets\/img\/",
        "css_url": "https:\/\/priximbattable.net\/themes\/classic\/assets\/css\/",
        "js_url": "https:\/\/priximbattable.net\/themes\/classic\/assets\/js\/",
        "pic_url": "https:\/\/priximbattable.net\/upload\/",
        "pages": {
          "address": "https:\/\/priximbattable.net\/adresse",
          "addresses": "https:\/\/priximbattable.net\/adresses",
          "authentication": "https:\/\/priximbattable.net\/connexion",
          "cart": "https:\/\/priximbattable.net\/panier",
          "category": "https:\/\/priximbattable.net\/index.php?controller=category",
          "cms": "https:\/\/priximbattable.net\/index.php?controller=cms",
          "contact": "https:\/\/priximbattable.net\/nous-contacter",
          "discount": "https:\/\/priximbattable.net\/reduction",
          "guest_tracking": "https:\/\/priximbattable.net\/suivi-commande-invite",
          "history": "https:\/\/priximbattable.net\/historique-commandes",
          "identity": "https:\/\/priximbattable.net\/identite",
          "index": "https:\/\/priximbattable.net\/",
          "my_account": "https:\/\/priximbattable.net\/mon-compte",
          "order_confirmation": "https:\/\/priximbattable.net\/confirmation-commande",
          "order_detail": "https:\/\/priximbattable.net\/index.php?controller=order-detail",
          "order_follow": "https:\/\/priximbattable.net\/suivi-commande",
          "order": "https:\/\/priximbattable.net\/commande",
          "order_return": "https:\/\/priximbattable.net\/index.php?controller=order-return",
          "order_slip": "https:\/\/priximbattable.net\/avoirs",
          "pagenotfound": "https:\/\/priximbattable.net\/page-introuvable",
          "password": "https:\/\/priximbattable.net\/recuperation-mot-de-passe",
          "pdf_invoice": "https:\/\/priximbattable.net\/index.php?controller=pdf-invoice",
          "pdf_order_return": "https:\/\/priximbattable.net\/index.php?controller=pdf-order-return",
          "pdf_order_slip": "https:\/\/priximbattable.net\/index.php?controller=pdf-order-slip",
          "prices_drop": "https:\/\/priximbattable.net\/promotions",
          "product": "https:\/\/priximbattable.net\/index.php?controller=product",
          "search": "https:\/\/priximbattable.net\/recherche",
          "sitemap": "https:\/\/priximbattable.net\/Sitemap",
          "stores": "https:\/\/priximbattable.net\/magasins",
          "supplier": "https:\/\/priximbattable.net\/fournisseur",
          "register": "https:\/\/priximbattable.net\/connexion?create_account=1",
          "order_login": "https:\/\/priximbattable.net\/commande?login=1"
        },
        "alternative_langs": {
          "fr": "https:\/\/priximbattable.net\/content\/1-livraison"
        },
        "theme_assets": "\/themes\/classic\/assets\/",
        "actions": {
          "logout": "https:\/\/priximbattable.net\/?mylogout="
        },
        "no_picture_image": {
          "bySize": {
            "small_default": {
              "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-small_default.jpg",
              "width": 98,
              "height": 98
            },
            "cart_default": {
              "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-cart_default.jpg",
              "width": 125,
              "height": 125
            },
            "home_default": {
              "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-home_default.jpg",
              "width": 366,
              "height": 366
            },
            "medium_default": {
              "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-medium_default.jpg",
              "width": 452,
              "height": 452
            },
            "large_default": {
              "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-large_default.jpg",
              "width": 800,
              "height": 800
            }
          },
          "small": {
            "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-small_default.jpg",
            "width": 98,
            "height": 98
          },
          "medium": {
            "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-home_default.jpg",
            "width": 366,
            "height": 366
          },
          "large": {
            "url": "https:\/\/priximbattable.net\/img\/p\/fr-default-large_default.jpg",
            "width": 800,
            "height": 800
          },
          "legend": ""
        }
      },
      "configuration": {
        "display_taxes_label": true,
        "is_catalog": false,
        "show_prices": true,
        "opt_in": {
          "partner": false
        },
        "quantity_discount": {
          "type": "discount",
          "label": "Remise"
        },
        "voucher_enabled": 1,
        "return_enabled": 0
      },
      "field_required": [],
      "breadcrumb": {
        "links": [{
          "title": "Accueil",
          "url": "https:\/\/priximbattable.net\/"
        }, {
          "title": "Livraison",
          "url": "https:\/\/priximbattable.net\/content\/1-livraison"
        }],
        "count": 2
      },
      "link": {
        "protocol_link": "https:\/\/",
        "protocol_content": "https:\/\/"
      },
      "time": 1613121625,
      "static_token": "3f6bbd4a0307a721e2d981e28cea3b94",
      "token": "c007e1d7fe78011cfb06b98b7b04ce58"
    };
    var serviceWorkerPath = "https:\/\/priximbattable.net\/wk-service-worker.js";
  </script>



  <style>
    .ets_mm_megamenu .mm_menus_li h4,
    .ets_mm_megamenu .mm_menus_li h5,
    .ets_mm_megamenu .mm_menus_li h6,
    .ets_mm_megamenu .mm_menus_li h1,
    .ets_mm_megamenu .mm_menus_li h2,
    .ets_mm_megamenu .mm_menus_li h3,
    .ets_mm_megamenu .mm_menus_li h4 *:not(i),
    .ets_mm_megamenu .mm_menus_li h5 *:not(i),
    .ets_mm_megamenu .mm_menus_li h6 *:not(i),
    .ets_mm_megamenu .mm_menus_li h1 *:not(i),
    .ets_mm_megamenu .mm_menus_li h2 *:not(i),
    .ets_mm_megamenu .mm_menus_li h3 *:not(i),
    .ets_mm_megamenu .mm_menus_li>a {
      font-family: inherit;
    }

    .ets_mm_megamenu *:not(.fa):not(i) {
      font-family: 'Montserrat';
      font-weight: 600;
      letter-spacing: -0.05rem;

      padding-left: 0.15rem;
      padding-right: 0.15rem;
    }

    .ets_mm_block * {
      font-size: 14px;
    }

    @media (min-width: 768px) {

      /*layout 1*/
      .ets_mm_megamenu.layout_layout1 {
        background: ;
      }

      .layout_layout1 .ets_mm_megamenu_content {
        background: linear-gradient(#FFFFFF, #F2F2F2) repeat scroll 0 0 rgba(0, 0, 0, 0);
        background: -webkit-linear-gradient(#FFFFFF, #F2F2F2) repeat scroll 0 0 rgba(0, 0, 0, 0);
        background: -o-linear-gradient(#FFFFFF, #F2F2F2) repeat scroll 0 0 rgba(0, 0, 0, 0);
      }

      .ets_mm_megamenu.layout_layout1:not(.ybc_vertical_menu) .mm_menus_ul {
        background: ;
      }

      #header .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li>a,
      .layout_layout1 .ybc-menu-vertical-button,
      .layout_layout1 .mm_extra_item * {
        color: #484848
      }

      .layout_layout1 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #484848
      }

      .layout_layout1 .mm_menus_li:hover>a,
      .layout_layout1 .mm_menus_li.active>a,
      #header .layout_layout1 .mm_menus_li:hover>a,
      .layout_layout1:hover .ybc-menu-vertical-button,
      .layout_layout1 .mm_extra_item button[type="submit"]:hover i,
      #header .layout_layout1 .mm_menus_li.active>a {
        color: #ec4249;
      }

      .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li>a:before,
      .layout_layout1.ybc_vertical_menu:hover .ybc-menu-vertical-button:before,
      .layout_layout1:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar,
      .ybc-menu-vertical-button.layout_layout1:hover {
        background-color: #ec4249;
      }

      .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .ets_mm_megamenu.layout_layout1.ybc_vertical_menu:hover,
      #header .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .ets_mm_megamenu.layout_layout1.ybc_vertical_menu:hover {
        background: #ffffff;
      }

      .layout_layout1.ets_mm_megamenu .mm_columns_ul,
      .layout_layout1.ybc_vertical_menu .mm_menus_ul {
        background-color: #ffffff;
      }

      #header .layout_layout1 .ets_mm_block_content a,
      #header .layout_layout1 .ets_mm_block_content p,
      .layout_layout1.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout1.ybc_vertical_menu .mm_menus_li>a {
        color: #414141;
      }

      .layout_layout1 .mm_columns_ul h1,
      .layout_layout1 .mm_columns_ul h2,
      .layout_layout1 .mm_columns_ul h3,
      .layout_layout1 .mm_columns_ul h4,
      .layout_layout1 .mm_columns_ul h5,
      .layout_layout1 .mm_columns_ul h6,
      .layout_layout1 .mm_columns_ul .ets_mm_block>h1 a,
      .layout_layout1 .mm_columns_ul .ets_mm_block>h2 a,
      .layout_layout1 .mm_columns_ul .ets_mm_block>h3 a,
      .layout_layout1 .mm_columns_ul .ets_mm_block>h4 a,
      .layout_layout1 .mm_columns_ul .ets_mm_block>h5 a,
      .layout_layout1 .mm_columns_ul .ets_mm_block>h6 a,
      #header .layout_layout1 .mm_columns_ul .ets_mm_block>h1 a,
      #header .layout_layout1 .mm_columns_ul .ets_mm_block>h2 a,
      #header .layout_layout1 .mm_columns_ul .ets_mm_block>h3 a,
      #header .layout_layout1 .mm_columns_ul .ets_mm_block>h4 a,
      #header .layout_layout1 .mm_columns_ul .ets_mm_block>h5 a,
      #header .layout_layout1 .mm_columns_ul .ets_mm_block>h6 a,
      .layout_layout1 .mm_columns_ul .h1,
      .layout_layout1 .mm_columns_ul .h2,
      .layout_layout1 .mm_columns_ul .h3,
      .layout_layout1 .mm_columns_ul .h4,
      .layout_layout1 .mm_columns_ul .h5,
      .layout_layout1 .mm_columns_ul .h6 {
        color: #414141;
      }


      .layout_layout1 li:hover>a,
      .layout_layout1 li>a:hover,
      .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title,
      .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title a,
      .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title,
      .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title,
      #header .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title a,
      #header .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title,
      #header .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title a,
      .layout_layout1.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout1 li:hover>a,
      .layout_layout1.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout1.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout1 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout1 li>a:hover {
        color: #ec4249;
      }


      /*end layout 1*/


      /*layout 2*/
      .ets_mm_megamenu.layout_layout2 {
        background-color: #3cabdb;
      }

      #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li>a,
      .layout_layout2 .ybc-menu-vertical-button,
      .layout_layout2 .mm_extra_item * {
        color: #ffffff
      }

      .layout_layout2 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #ffffff
      }

      .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li.active>a,
      #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .layout_layout2:hover .ybc-menu-vertical-button,
      .layout_layout2 .mm_extra_item button[type="submit"]:hover i,
      #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li.active>a {
        color: #ffffff;
      }

      .layout_layout2:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #ffffff;
      }

      .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .ets_mm_megamenu.layout_layout2.ybc_vertical_menu:hover {
        background-color: #50b4df;
      }

      .layout_layout2.ets_mm_megamenu .mm_columns_ul,
      .layout_layout2.ybc_vertical_menu .mm_menus_ul {
        background-color: #ffffff;
      }

      #header .layout_layout2 .ets_mm_block_content a,
      .layout_layout2.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout2.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout2 .ets_mm_block_content p {
        color: #666666;
      }

      .layout_layout2 .mm_columns_ul h1,
      .layout_layout2 .mm_columns_ul h2,
      .layout_layout2 .mm_columns_ul h3,
      .layout_layout2 .mm_columns_ul h4,
      .layout_layout2 .mm_columns_ul h5,
      .layout_layout2 .mm_columns_ul h6,
      .layout_layout2 .mm_columns_ul .ets_mm_block>h1 a,
      .layout_layout2 .mm_columns_ul .ets_mm_block>h2 a,
      .layout_layout2 .mm_columns_ul .ets_mm_block>h3 a,
      .layout_layout2 .mm_columns_ul .ets_mm_block>h4 a,
      .layout_layout2 .mm_columns_ul .ets_mm_block>h5 a,
      .layout_layout2 .mm_columns_ul .ets_mm_block>h6 a,
      #header .layout_layout2 .mm_columns_ul .ets_mm_block>h1 a,
      #header .layout_layout2 .mm_columns_ul .ets_mm_block>h2 a,
      #header .layout_layout2 .mm_columns_ul .ets_mm_block>h3 a,
      #header .layout_layout2 .mm_columns_ul .ets_mm_block>h4 a,
      #header .layout_layout2 .mm_columns_ul .ets_mm_block>h5 a,
      #header .layout_layout2 .mm_columns_ul .ets_mm_block>h6 a,
      .layout_layout2 .mm_columns_ul .h1,
      .layout_layout2 .mm_columns_ul .h2,
      .layout_layout2 .mm_columns_ul .h3,
      .layout_layout2 .mm_columns_ul .h4,
      .layout_layout2 .mm_columns_ul .h5,
      .layout_layout2 .mm_columns_ul .h6 {
        color: #414141;
      }


      .layout_layout2 li:hover>a,
      .layout_layout2 li>a:hover,
      .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title,
      .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title a,
      .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title,
      .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title,
      #header .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title a,
      #header .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title,
      #header .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout2 li:hover>a,
      .layout_layout2.ybc_vertical_menu .mm_menus_li>a,
      .layout_layout2.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout2.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout2 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout2 li>a:hover {
        color: #fc4444;
      }



      /*layout 3*/
      .ets_mm_megamenu.layout_layout3,
      .layout_layout3 .mm_tab_li_content {
        background-color: #f1f1f1;
        /* background-color: #000; black friday */
      }

      #header .layout_layout3:not(.ybc_vertical_menu) .mm_menus_li>a,
      .layout_layout3 .ybc-menu-vertical-button,
      .layout_layout3 .mm_extra_item * {
        color: #222222
      }

      .layout_layout3 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #222222
      }

      .layout_layout3 .mm_menus_li:hover>a,
      .layout_layout3 .mm_menus_li.active>a,
      .layout_layout3 .mm_extra_item button[type="submit"]:hover i,
      #header .layout_layout3 .mm_menus_li:hover>a,
      #header .layout_layout3 .mm_menus_li.active>a,
      .layout_layout3:hover .ybc-menu-vertical-button,
      .layout_layout3:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        color: #ffffff;
      }

      .layout_layout3:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      #header .layout_layout3:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .ets_mm_megamenu.layout_layout3.ybc_vertical_menu:hover,
      .layout_layout3 .mm_tabs_li.open .mm_columns_contents_ul,
      .layout_layout3 .mm_tabs_li.open .mm_tab_li_content {
        background-color: #ff0000;
      }

      .layout_layout3 .mm_tabs_li.open.mm_tabs_has_content .mm_tab_li_content .mm_tab_name::before {
        border-right-color: #ff0000;
      }

      .layout_layout3.ets_mm_megamenu .mm_columns_ul,
      .ybc_vertical_menu.layout_layout3 .mm_menus_ul.ets_mn_submenu_full_height .mm_menus_li:hover a::before,
      .layout_layout3.ybc_vertical_menu .mm_menus_ul {
        background-color: #ffffff;
        border-color: #ffffff;
      }

      #header .layout_layout3 .ets_mm_block_content a,
      #header .layout_layout3 .ets_mm_block_content p,
      .layout_layout3.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout3.ybc_vertical_menu .mm_menus_li>a {
        color: #000000;
      }

      .layout_layout3 .mm_columns_ul h1,
      .layout_layout3 .mm_columns_ul h2,
      .layout_layout3 .mm_columns_ul h3,
      .layout_layout3 .mm_columns_ul h4,
      .layout_layout3 .mm_columns_ul h5,
      .layout_layout3 .mm_columns_ul h6,
      .layout_layout3 .mm_columns_ul .ets_mm_block>h1 a,
      .layout_layout3 .mm_columns_ul .ets_mm_block>h2 a,
      .layout_layout3 .mm_columns_ul .ets_mm_block>h3 a,
      .layout_layout3 .mm_columns_ul .ets_mm_block>h4 a,
      .layout_layout3 .mm_columns_ul .ets_mm_block>h5 a,
      .layout_layout3 .mm_columns_ul .ets_mm_block>h6 a,
      #header .layout_layout3 .mm_columns_ul .ets_mm_block>h1 a,
      #header .layout_layout3 .mm_columns_ul .ets_mm_block>h2 a,
      #header .layout_layout3 .mm_columns_ul .ets_mm_block>h3 a,
      #header .layout_layout3 .mm_columns_ul .ets_mm_block>h4 a,
      #header .layout_layout3 .mm_columns_ul .ets_mm_block>h5 a,
      #header .layout_layout3 .mm_columns_ul .ets_mm_block>h6 a,
      .layout_layout3 .mm_columns_ul .h1,
      .layout_layout3 .mm_columns_ul .h2,
      .layout_layout3 .mm_columns_ul .h3,
      .layout_layout3.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout3.ybc_vertical_menu .mm_menus_li:hover>a,
      .layout_layout3 .mm_columns_ul .h4,
      .layout_layout3 .mm_columns_ul .h5,
      .layout_layout3 .mm_columns_ul .h6 {
        color: #000000;
      }


      .layout_layout3 li:hover>a,
      .layout_layout3 li>a:hover,
      .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title,
      .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title a,
      .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title,
      .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title,
      #header .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title a,
      #header .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title,
      #header .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout3 li:hover>a,
      #header .layout_layout3 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout3 li>a:hover,
      .layout_layout3.ybc_vertical_menu .mm_menus_li>a,
      .layout_layout3 .has-sub .ets_mm_categories li>a:hover,
      #header .layout_layout3 .has-sub .ets_mm_categories li>a:hover {
        color: #fc4444;
      }


      /*layout 4*/

      .ets_mm_megamenu.layout_layout4 {
        background-color: #ffffff;
      }

      .ets_mm_megamenu.layout_layout4:not(.ybc_vertical_menu) .mm_menus_ul {
        background: #ffffff;
      }

      #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li>a,
      .layout_layout4 .ybc-menu-vertical-button,
      .layout_layout4 .mm_extra_item * {
        color: #333333
      }

      .layout_layout4 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #333333
      }

      .layout_layout4 .mm_menus_li:hover>a,
      .layout_layout4 .mm_menus_li.active>a,
      #header .layout_layout4 .mm_menus_li:hover>a,
      .layout_layout4:hover .ybc-menu-vertical-button,
      #header .layout_layout4 .mm_menus_li.active>a {
        color: #ffffff;
      }

      .layout_layout4:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #ffffff;
      }

      .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li.active>a,
      .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover>span,
      .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li.active>span,
      #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li.active>a,
      .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .ets_mm_megamenu.layout_layout4.ybc_vertical_menu:hover,
      #header .layout_layout4 .mm_menus_li:hover>span,
      #header .layout_layout4 .mm_menus_li.active>span {
        background-color: #ec4249;
      }

      .layout_layout4 .ets_mm_megamenu_content {
        border-bottom-color: #ec4249;
      }

      .layout_layout4.ets_mm_megamenu .mm_columns_ul,
      .ybc_vertical_menu.layout_layout4 .mm_menus_ul .mm_menus_li:hover a::before,
      .layout_layout4.ybc_vertical_menu .mm_menus_ul {
        background-color: #ffffff;
      }

      #header .layout_layout4 .ets_mm_block_content a,
      .layout_layout4.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout4.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout4 .ets_mm_block_content p {
        color: #666666;
      }

      .layout_layout4 .mm_columns_ul h1,
      .layout_layout4 .mm_columns_ul h2,
      .layout_layout4 .mm_columns_ul h3,
      .layout_layout4 .mm_columns_ul h4,
      .layout_layout4 .mm_columns_ul h5,
      .layout_layout4 .mm_columns_ul h6,
      .layout_layout4 .mm_columns_ul .ets_mm_block>h1 a,
      .layout_layout4 .mm_columns_ul .ets_mm_block>h2 a,
      .layout_layout4 .mm_columns_ul .ets_mm_block>h3 a,
      .layout_layout4 .mm_columns_ul .ets_mm_block>h4 a,
      .layout_layout4 .mm_columns_ul .ets_mm_block>h5 a,
      .layout_layout4 .mm_columns_ul .ets_mm_block>h6 a,
      #header .layout_layout4 .mm_columns_ul .ets_mm_block>h1 a,
      #header .layout_layout4 .mm_columns_ul .ets_mm_block>h2 a,
      #header .layout_layout4 .mm_columns_ul .ets_mm_block>h3 a,
      #header .layout_layout4 .mm_columns_ul .ets_mm_block>h4 a,
      #header .layout_layout4 .mm_columns_ul .ets_mm_block>h5 a,
      #header .layout_layout4 .mm_columns_ul .ets_mm_block>h6 a,
      .layout_layout4 .mm_columns_ul .h1,
      .layout_layout4 .mm_columns_ul .h2,
      .layout_layout4 .mm_columns_ul .h3,
      .layout_layout4 .mm_columns_ul .h4,
      .layout_layout4 .mm_columns_ul .h5,
      .layout_layout4 .mm_columns_ul .h6 {
        color: #414141;
      }

      .layout_layout4 li:hover>a,
      .layout_layout4 li>a:hover,
      .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title,
      .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title a,
      .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title,
      .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title,
      #header .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title a,
      #header .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title,
      #header .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout4 li:hover>a,
      .layout_layout4.ybc_vertical_menu .mm_menus_li>a,
      .layout_layout4.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout4.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout4 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout4 li>a:hover {
        color: #ec4249;
      }

      /* end layout 4*/




      /* Layout 5*/
      .ets_mm_megamenu.layout_layout5 {
        background-color: #f6f6f6;
      }

      .ets_mm_megamenu.layout_layout5:not(.ybc_vertical_menu) .mm_menus_ul {
        background: #f6f6f6;
      }

      #header .layout_layout5:not(.ybc_vertical_menu) .mm_menus_li>a,
      .layout_layout5 .ybc-menu-vertical-button,
      .layout_layout5 .mm_extra_item * {
        color: #333333
      }

      .layout_layout5 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #333333
      }

      .layout_layout5 .mm_menus_li:hover>a,
      .layout_layout5 .mm_menus_li.active>a,
      .layout_layout5 .mm_extra_item button[type="submit"]:hover i,
      #header .layout_layout5 .mm_menus_li:hover>a,
      #header .layout_layout5 .mm_menus_li.active>a,
      .layout_layout5:hover .ybc-menu-vertical-button {
        color: #ec4249;
      }

      .layout_layout5:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar {
        background-color: #ec4249;
      }

      .layout_layout5 .mm_menus_li>a:before {
        background-color: #ec4249;
      }


      .layout_layout5:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      #header .layout_layout5:not(.ybc_vertical_menu) .mm_menus_li:hover>a,
      .ets_mm_megamenu.layout_layout5.ybc_vertical_menu:hover,
      #header .layout_layout5 .mm_menus_li:hover>a {
        background-color: ;
      }

      .layout_layout5.ets_mm_megamenu .mm_columns_ul,
      .ybc_vertical_menu.layout_layout5 .mm_menus_ul .mm_menus_li:hover a::before,
      .layout_layout5.ybc_vertical_menu .mm_menus_ul {
        background-color: #ffffff;
      }

      #header .layout_layout5 .ets_mm_block_content a,
      .layout_layout5.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout5.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout5 .ets_mm_block_content p {
        color: #333333;
      }

      .layout_layout5 .mm_columns_ul h1,
      .layout_layout5 .mm_columns_ul h2,
      .layout_layout5 .mm_columns_ul h3,
      .layout_layout5 .mm_columns_ul h4,
      .layout_layout5 .mm_columns_ul h5,
      .layout_layout5 .mm_columns_ul h6,
      .layout_layout5 .mm_columns_ul .ets_mm_block>h1 a,
      .layout_layout5 .mm_columns_ul .ets_mm_block>h2 a,
      .layout_layout5 .mm_columns_ul .ets_mm_block>h3 a,
      .layout_layout5 .mm_columns_ul .ets_mm_block>h4 a,
      .layout_layout5 .mm_columns_ul .ets_mm_block>h5 a,
      .layout_layout5 .mm_columns_ul .ets_mm_block>h6 a,
      #header .layout_layout5 .mm_columns_ul .ets_mm_block>h1 a,
      #header .layout_layout5 .mm_columns_ul .ets_mm_block>h2 a,
      #header .layout_layout5 .mm_columns_ul .ets_mm_block>h3 a,
      #header .layout_layout5 .mm_columns_ul .ets_mm_block>h4 a,
      #header .layout_layout5 .mm_columns_ul .ets_mm_block>h5 a,
      #header .layout_layout5 .mm_columns_ul .ets_mm_block>h6 a,
      .layout_layout5 .mm_columns_ul .h1,
      .layout_layout5 .mm_columns_ul .h2,
      .layout_layout5 .mm_columns_ul .h3,
      .layout_layout5 .mm_columns_ul .h4,
      .layout_layout5 .mm_columns_ul .h5,
      .layout_layout5 .mm_columns_ul .h6 {
        color: #414141;
      }

      .layout_layout5 li:hover>a,
      .layout_layout5 li>a:hover,
      .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title,
      .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title a,
      .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title,
      .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title a,
      #header .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title,
      #header .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title a,
      #header .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title,
      #header .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title a,
      .layout_layout5.ybc_vertical_menu .mm_menus_li>a,
      #header .layout_layout5 li:hover>a,
      .layout_layout5.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout5.ybc_vertical_menu .mm_menus_li:hover>a,
      #header .layout_layout5 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout5 li>a:hover {
        color: #ec4249;
      }

      /*end layout 5*/
    }


    @media (max-width: 767px) {

      .ybc-menu-vertical-button,
      .transition_floating .close_menu,
      .transition_full .close_menu {
        background-color: #000000;
        color: #ffffff;
      }

      .transition_floating .close_menu *,
      .transition_full .close_menu *,
      .ybc-menu-vertical-button .icon-bar {
        color: #ffffff;
      }

      .close_menu .icon-bar,
      .ybc-menu-vertical-button .icon-bar {
        background-color: #ffffff;
      }

      .mm_menus_back_icon {
        border-color: #ffffff;
      }

      .layout_layout1 .mm_menus_li:hover>a,
      #header .layout_layout1 .mm_menus_li:hover>a {
        color: #ec4249;
      }

      .layout_layout1 .mm_has_sub.mm_menus_li:hover .arrow::before {
        /*border-color: #ec4249;*/
      }


      .layout_layout1 .mm_menus_li:hover>a,
      #header .layout_layout1 .mm_menus_li:hover>a {
        background-color: #ffffff;
      }

      .layout_layout1 li:hover>a,
      .layout_layout1 li>a:hover,
      #header .layout_layout1 li:hover>a,
      #header .layout_layout1 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout1 li>a:hover {
        color: #ec4249;
      }

      /*------------------------------------------------------*/


      .layout_layout2 .mm_menus_li:hover>a,
      #header .layout_layout2 .mm_menus_li:hover>a {
        color: #ffffff;
      }

      .layout_layout2 .mm_has_sub.mm_menus_li:hover .arrow::before {
        border-color: #ffffff;
      }

      .layout_layout2 .mm_menus_li:hover>a,
      #header .layout_layout2 .mm_menus_li:hover>a {
        background-color: #50b4df;
      }

      .layout_layout2 li:hover>a,
      .layout_layout2 li>a:hover,
      #header .layout_layout2 li:hover>a,
      #header .layout_layout2 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout2 li>a:hover {
        color: #fc4444;
      }

      /*------------------------------------------------------*/



      .layout_layout3 .mm_menus_li:hover>a,
      #header .layout_layout3 .mm_menus_li:hover>a {
        color: #ffffff;
      }

      .layout_layout3 .mm_has_sub.mm_menus_li:hover .arrow::before {
        border-color: #ffffff;
      }

      .layout_layout3 .mm_menus_li:hover>a,
      #header .layout_layout3 .mm_menus_li:hover>a {
        background-color: #ff0000;
      }

      .layout_layout3 li:hover>a,
      .layout_layout3 li>a:hover,
      #header .layout_layout3 li:hover>a,
      #header .layout_layout3 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout3 li>a:hover,
      .layout_layout3 .has-sub .ets_mm_categories li>a:hover,
      #header .layout_layout3 .has-sub .ets_mm_categories li>a:hover {
        color: #fc4444;
      }



      /*------------------------------------------------------*/


      .layout_layout4 .mm_menus_li:hover>a,
      #header .layout_layout4 .mm_menus_li:hover>a {
        color: #ffffff;
      }

      .layout_layout4 .mm_has_sub.mm_menus_li:hover .arrow::before {
        border-color: #ffffff;
      }

      .layout_layout4 .mm_menus_li:hover>a,
      #header .layout_layout4 .mm_menus_li:hover>a {
        background-color: #ec4249;
      }

      .layout_layout4 li:hover>a,
      .layout_layout4 li>a:hover,
      #header .layout_layout4 li:hover>a,
      #header .layout_layout4 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout4 li>a:hover {
        color: #ec4249;
      }


      /*------------------------------------------------------*/


      .layout_layout5 .mm_menus_li:hover>a,
      #header .layout_layout5 .mm_menus_li:hover>a {
        color: #ec4249;
      }

      .layout_layout5 .mm_has_sub.mm_menus_li:hover .arrow::before {
        border-color: #ec4249;
      }

      .layout_layout5 .mm_menus_li:hover>a,
      #header .layout_layout5 .mm_menus_li:hover>a {
        background-color: ;
      }

      .layout_layout5 li:hover>a,
      .layout_layout5 li>a:hover,
      #header .layout_layout5 li:hover>a,
      #header .layout_layout5 .mm_columns_ul .mm_block_type_product .product-title>a:hover,
      #header .layout_layout5 li>a:hover {
        color: #ec4249;
      }

      /*------------------------------------------------------*/




    }
  </style>
  <style>
    .lgcookieslaw_banner {
      display: table;
      width: 100%;
      position: fixed;
      left: 0;
      repeat-x scroll left top;
      background: #000000;
      border-color: #000000;
      border-left: 1px solid #000000;
      border-radius: 3px 3px 3px 3px;
      border-right: 1px solid #000000;
      color: #FFFFFF !important;
      z-index: 99999;
      border-style: solid;
      border-width: 1px;
      margin: 0;
      outline: medium none;
      text-align: center;
      vertical-align: middle;
      text-shadow: 0 0 0 0;
      -webkit-box-shadow: 0px 1px 5px 0px #000000;
      -moz-box-shadow: 0px 1px 5px 0px #000000;
      box-shadow: 0px 1px 5px 0px #000000;
      font-size: 12px;

      bottom: 0;
      ;
      opacity: 0.9;

    }

    .lgcookieslaw_banner>form {
      position: relative;
    }

    .lgcookieslaw_banner span.lgcookieslaw_btn {
      border-color: #8BC954 !important;
      background: #8BC954 !important;
      color: #FFFFFF !important;
      text-align: center;
      margin: 5px 0px 5px 0px;
      padding: 5px 5px;
      display: inline-block;
      border: 0;
      font-weight: bold;
      height: 26px;
      line-height: 16px;
      width: auto;
      font-size: 12px;
      cursor: pointer;
    }

    .lgcookieslaw_banner span:hover.lgcookieslaw_btn {
      moz-opacity: 0.85;
      opacity: 0.85;
      filter: alpha(opacity=85);
    }

    .lgcookieslaw_banner a.lgcookieslaw_btn {
      border-color: #5BC0DE;
      background: #5BC0DE;
      color: #FFFFFF !important;
      margin: 5px 0px 5px 0px;
      text-align: center;
      padding: 5px 5px;
      display: inline-block;
      border: 0;
      font-weight: bold;
      height: 26px;
      line-height: 16px;
      width: auto;
      font-size: 12px;
    }

    @media (max-width: 768px) {

      .lgcookieslaw_banner span.lgcookieslaw_btn,
      .lgcookieslaw_banner a.lgcookieslaw_btn {
        height: auto;
      }
    }

    .lgcookieslaw_banner a:hover.lgcookieslaw_btn {
      border-color: #5BC0DE;
      background: #5BC0DE;
      color: #FFFFFF !important;
      moz-opacity: 0.85;
      opacity: 0.85;
      filter: alpha(opacity=85);
    }

    .lgcookieslaw_close_banner_btn {
      cursor: pointer;
      height: 21px;
      max-width: 21px;
      width: 21px;
    }

    .lgcookieslaw_container {
      display: table;
      margin: 0 auto;
    }

    .lgcookieslaw_button_container {
      display: table-cell;
      padding: 0px;
      vertical-align: middle;
    }

    .lgcookieslaw_button_container div {
      display: table-cell;
      padding: 0px 4px 0px 0px;
      vertical-align: middle;
    }

    .lgcookieslaw_message {
      display: table-cell;
      font-size: 12px;
      padding: 2px 5px 5px 5px;
      vertical-align: middle;
    }

    .lgcookieslaw_message p {
      margin: 0;
      color: #FFFFFF !important;
    }

    .lgcookieslaw_btn-close {
      position: absolute;
      right: 5px;
      top: 5px;
    }
  </style>

  <script type="text/javascript">
    function closeinfo(accept) {
      var banners = document.getElementsByClassName("lgcookieslaw_banner");
      if (banners) {
        for (var i = 0; i < banners.length; i++) {
          banners[i].style.display = 'none';
        }
      }

      if (typeof accept != 'undefined' && accept == true) {
        setCookie("__lglaw", 1, 31536000);
      }
    }

    function checkLgCookie() {
      return document.cookie.match(/^(.*;)?\s*__lglaw\s*=\s*[^;]+(.*)?$/);
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    var lgbtnclick = function() {
      var buttons = document.getElementsByClassName("lgcookieslaw_btn_accept");
      if (buttons != null) {
        for (var i = 0; i < buttons.length; i++) {
          buttons[i].addEventListener("click", function() {
            closeinfo(true);

          });
        }
      }
    };

    window.addEventListener('load', function() {
      if (checkLgCookie()) {
        closeinfo();
      } else {


        lgbtnclick();
      }
    });
  </script>

  <link rel="manifest" href="/modules/wkpwa/manifest.json">

  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="priximbattable">
  <meta name="theme-color" content="#e1e1e1">

  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#e1e1e1">
  <meta name="apple-mobile-web-app-title" content="priximbattable">
  <link rel="apple-touch-icon" href="/modules/wkpwa/views/img/appIcon/wk-pwa-logo-152x152.png">
  <link rel="stylesheet" href="/themes/classic/assets/css/custom.css">
  <link rel="stylesheet" href="/themes/classic/assets/css/theme.css">
  <link rel="stylesheet" href="/themes/classic/assets/css/error.css" type="text/css" media="all">
  <link rel="stylesheet" href="/modules/mh_oney/views/css/front.css">

  <!-- Tile Icon for Windows -->
  <meta name="msapplication-TileImage" content="/modules/wkpwa/views/img/appIcon/wk-pwa-favicon-72x72.png">
  <meta name="msapplication-TileColor" content="#e1e1e1">
  <meta name="msapplication-starturl" content="https://priximbattable.net/">





  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/themes/classic/assets/css/newAlu.css" />

  <link rel="stylesheet" href="/themes/classic/assets/css/styles.css">
  <script>
    function checkSelection(val) {

      var selectElmt = document.getElementById("contact_motif");
      var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;

      var x = document.getElementById("contact_facture");
      var y = document.getElementById("form");
      var z = document.getElementById("num_transporteur");
      if (val == '2' || val == '4' || val == '5' || val == '6') {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }

      if (val == '3') {
        y.style.display = "none";
        z.style.display = "block";
      } else {
        y.style.display = "block";
        z.style.display = "none";
      }

    }
  </script>

</head>

<body id="cms" class="lang-fr country-fr currency-eur layout-full-width page-cms tax-display-enabled cms-id-1">


  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNVWQF&nojscript=true" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->


  <main>



    <header id="header">


      <!-- Miguel removido <div class="divLoading">
  <div class="divLoadingImg"></div>
</div>-->


      <div class="header-banner">

      </div>



      <nav class="header-nav">
        <div class="container">
          <div class="row">
            <div class="hidden-md-down">

              <div class="col-md-1" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
                <img loading="lazy" src="https://priximbattable.net/img/fr.png" style="height: 30px;" alt="France" title="France">
              </div>

              <div class="col-md-10" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
                <p class="alu_p_fabricante1">
                  Visualiser nos produits chez vous avec l’application de réalité augmentée <strong>AR Viewer PrixImbattable</strong>
                  <a href="https://priximbattable.net/content/26-application-ar-viewer-prix-imbattable-visualiser-nos-produits-chez-vous" class="botaoApp3D">Cliquez ici</a>
                </p>
              </div>
              <div class="col-md-1" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
                <img loading="lazy" src="https://priximbattable.net/img/ue.png" style="height: 30px;" alt="Union Européenne" title="Union Européenne">
              </div>

              <!--<div class="col-md-8 col-xs-12">

                        <div class="sp_customhtml_2_16151864781211515144
		support-info spcustom_html">
                                        <ul>
<li class="phone-support">Service client : <strong>TÉL : 04 72 80 93 54  -  Lundi au Vendredi : 8h30/12h30 - 13h/18h</strong><strong> </strong></li>
</ul>
                    </div>


        </div>
        <div class="col-md-4 right-nav">
          <div class="tablet-view-phone">
            <ul>
              <li class="phone-support"><strong><a href="tel:04 72 80 93 54"><i class="material-icons">phone</i> 04 72 80 93 54</a> </strong></li>
            </ul>
          </div>
          <div id="_desktop_contact_link" class="hidden-md-down">
  <div id="contact-link">
          <div style="text-align: center; margin-top: 7px; margin-left: 60px;">
        <div class="row">
          <div class="col-md-12">
            <i class="material-icons" style="color: red;">phone</i>
          </div>
        </div>
        <div class="row" style="width: 144px;">
          <div class="col-md-12">
            <span style="font-size: 1rem;">04 72 80 93 54</span>
          </div>
        </div>
      </div>
      </div>
</div>


         <div class="currencies">
              <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=1" title="Euro"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_fr.png" alt="" /> €</a> | <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_chf.png" alt="" /> CHF</a>
          </div>-->
            </div>

          </div>
          <div class="hidden-md-up text-sm-center mobile">

            <div class="clearfix"></div>
            <div class="top-logo" id="_mobile_logo"></div>

            <div class="header-mobile" style="margin-left: 0px;">
              <!-- <div class="float-xs-left" id="menu-icon">
            <i class="material-icons d-inline">&#xE5D2;</i>
          </div> -->

              <div class="float-xs-right" id="_mobile_cart"></div>
              <div class="float-xs-right" id="_mobile_user_info"></div>
              <div class="float-xs-right" id="_mobile_contact">
                <div class="user-info">
                  <a href="https://priximbattable.net/nous-contacter">
                    <i class="material-icons">mail_outline&nbsp;</i>
                  </a>
                </div>
              </div>
              <div class="float-xs-right" id="_mobile_number">
                <div class="user-info">
                  <a href="tel:04 72 80 93 54"><i class="material-icons">phone</i></a>
                </div>
              </div>

              <!--<div class="float-xs-right" id="_mobile_flag">
    			  <div class="currencies">
    				  <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=1" title="Euro"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_fr.png" alt="" /> €</a> | <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_chf.png" alt="" /> CHF</a>
    			  </div>
    		  </div>-->
              <!--<div class="float-xs-right" id="_mobile_chat">
            <div class="user-info">
              <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">headset_mic</i></a>
            </div>
          </div>-->
              <div class="clearfix"></div>

            </div>
          </div>
        </div>
        </div>
      </nav>

      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12 hidden-sm-down" id="_desktop_logo" style="padding-bottom: 1.25rem;">
              <div class="col-md-4">
                <a href="https://priximbattable.net/">
                  <!-- <img loading="lazy" class="logo img-responsive" src="https://priximbattable.net/img/priximbattable-logo-1547030832.jpg" alt="priximbattable"> -->
                  <picture>
                    <source srcset="/img/priximbattable-logo.webp" type="image/webp">
                    <img loading="lazy" src="/img/priximbattable-logo.png" alt="{$shop.name}" class="logo img-responsive" width="453" height="66">
                  </picture>
                </a>
              </div>
              <div class="col-md-6 col-sm-12 position-static">
                <div id="search_widget" class="col-sm-12 search-widget" data-search-controller-url="//priximbattable.net/recherche">
                  <form method="get" action="//priximbattable.net/recherche">
                    <input type="hidden" name="controller" value="search">
                    <input type="text" name="s" value="" placeholder="Rechercher" aria-label="Rechercher" class="newAlu_inputSearch">
                    <button type="submit">
                      <i class="material-icons search">&#xE8B6;</i>
                      <span class="hidden-xl-down">Rechercher</span>
                    </button>
                  </form>
                </div>
              </div>
              <div class="col-md-2 hidden-sm-down right-nav">
                <div style="margin-top: 19px; position: absolute; z-index: 2; margin-left: 10px;">
                  <div class="row">
                    <div class="col-md-12" style="text-align: center;" title="04 72 80 93 54 ou Pour nous contacter par d'autres moyens cliquez ici">
                      <a href="https://priximbattable.net/service-client.php">
                        <i class="fa fa-phone fa-2x phoneIcon"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div id="_desktop_user_info" style="margin-top: 50px; margin-left: 379px !important;">
                  <div class="user-info" style="">
                    <div class="hidden-md-down" style="text-align: center; margin-top: 26px; margin-left: 0px !important;">
                      <div class="row">
                        <div class="col-md-12">
                          <a href="https://priximbattable.net/mon-compte" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
                            <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="hover" colors="primary:#000000,secondary:#000000" stroke="85" style="width:50px;height:50px">
                            </lord-icon>
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- mobile -->
                    <div class="hidden-md-up">
                      <a href="https://priximbattable.net/mon-compte" title="Identifiez-vous" rel="nofollow">
                        <i class="material-icons text-danger">&#xE7FF;</i>
                        <span class="hidden-sm-down" style="color: #7a7a7a; text-transform: capitalize; font-weight: normal; font-size: 16px;">Connexion</span>
                      </a>
                    </div>
                  </div>
                </div>
                <div id="_desktop_cart">
                  <div class="blockcart cart-preview inactive" data-refresh-url="//priximbattable.net/module/ps_shoppingcart/ajax">
                    <div class="header">

                      <div style="text-align: center; margin-top: -12px; position: absolute;" class="custom-align-shopping">
                        <div class="row">
                          <div class="col-md-12">
                            <lord-icon src="https://cdn.lordicon.com/slkvcfos.json" trigger="hover" colors="primary:#000000,secondary:#000000" stroke="85" style="width:50px;height:50px" class="lord-icon-cart">
                            </lord-icon>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      include(__DIR__ . "/../themes/classic/templates/_partials/menu_sav.tpl");
      ?>
      <div class="container">
        <div class="row">
          <!--<div class="col-md-12 newAlu_warning">
      <p class="newAlu_warningTitle">Information COVID-19 :</p>
      <p>Suite aux décisions gouvernementales les collectes se font sur rendez-vous. Une partie de l'équipe est en télétravail, privilégiez les contacts par tchat.</p>
      </div>-->
        </div>
      </div>


    </header>



    <aside id="notifications">
      <div class="container">



      </div>
    </aside>


    <section id="wrapper">

      <div class="container">

        <nav data-depth="2" class="breadcrumb hidden-sm-down">
          <ol itemscope itemtype="http://schema.org/BreadcrumbList">


            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
              <a itemprop="item" href="https://priximbattable.net/">
                <span itemprop="name">Accueil</span>
              </a>
              <meta itemprop="position" content="1">
            </li>


            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
              <a itemprop="item" href="https://priximbattable.net/service-client.php">
                <span itemprop="name">Service client</span>
              </a>
              <meta itemprop="position" content="2">
            </li>


          </ol>
        </nav>





        <div id="content-wrapper">


<section id="main">
    <?php

    if ($msg <> '') {
      echo ($msg . "<br /><br />");
    }

    if (file_exists('compress.php')) {
        include_once 'compress.php';
    } else {
        echo "<p>O arquivo compress.php não foi encontrado.</p>";
    }
    ?>

    <div class="container_form">
        <h1 class="titre_form">Déclarez un SAV<span><br />Nous sommes là pour vous aider.</span></h1>
        <form id="sav_form" method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
            <div class="col-md-5 col-xs-12">
                <div><input type="text" name="sav_nom" placeholder="Votre nom *" class="field" required /></div><br />
                <div><input type="text" name="sav_email" placeholder="Votre email *" class="field" required /></div><br />
                <div><input type="text" name="sav_cde" placeholder="Votre numéro de commande *" class="field" required /></div><br />
                <div><textarea name="sav_descriptif" class="field" rows="8">Votre problème : </textarea></div><br />
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha">
                <input type="submit" id="send" name="BENVOYER" value="ENVOYER" class="field2" />
            </div>
            <div class="col-md-5 col-xs-12">
                <p>Merci de joindre à votre dossier les photos du bon de livraison, des défauts constatés, ...<br />
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BENVOYER'])) {
                    $errorMessageDisplayed = false; // Variável para controlar se a mensagem de erro já foi exibida
                    foreach ($_FILES as $file) {
                        // Verifica se é um tipo de arquivo permitido
                        $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
                        /*if (!in_array($file['type'], $allowedTypes)) {
                            if (!$errorMessageDisplayed) {
                                echo "<span id='error_message' style='color: red;'>Votre image ne comporte pas une extension valide!</span><br>";
                                echo "<span id='error_message' style='color: red;'>Extension valide! JPG, PNG et GIF.</span>";
                                $errorMessageDisplayed = true;
                            }
                            break; // Interrompe o loop para exibir a mensagem apenas uma vez
                        }*/
                    }
                }
                ?>
                <input type="hidden" name="MAX_FILE_SIZE" value="10500000"><br />
                <?php
                if (function_exists('compressImage')) {
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<div><input name='sav_fichier$i' type='file' accept='image/jpeg, image/png, image/gif' /></div><br />";
                    }
                } else {
                    echo "A função compressImage não está disponível.";
                }
                ?>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BENVOYER'])) {
        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = $_POST['g-recaptcha-response'];
        } else {
            $captcha = false;
        }

        if (!$captcha) {
            echo "captcha error";
        } else {
            $secret = '6LfvN2EbAAAAANkR1w_AeNcohaoe3HKAGgIrspwt';
            $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']));

            if ($response->{'success'} == true && $response->{'score'} <= 0.5) {
                echo "Impossible de déclarer un SAV";
            } else {
                $reponse = $bdd->query('SELECT sav_utilisateur_id, sav_utilisateur_nom FROM sav_utilisateur WHERE sav_utilisateur_acces="Utilisateur" ORDER BY RAND() LIMIT 1');
                while ($donnees = $reponse->fetch()) {
                    $sav_intervenant = $donnees['sav_utilisateur_nom'];
                    $sav_utilisateur_id = $donnees['sav_utilisateur_id'];
                }

                $reponseUsers = $bdd->query("SELECT `sc_utilisateur_id` FROM `sc_utilisateur`
                where  `sc_mode_holydays` = 0 and `sc_draw` = 0  and  `sc_utilisateur_acces` not in  ('Logistique','Admin','Coora')");

                $resultUsers = $reponseUsers->fetchAll();
                $numUsers = count($resultUsers);
                $numRand = rand(1, $numUsers);

                $reponseT = $bdd->query("SELECT s.`sc_utilisateur_id`
                    FROM sav s
                    INNER JOIN sc_utilisateur u on u.sc_utilisateur_id = s.`sc_utilisateur_id`
                    WHERE u.`sc_mode_holydays` = 0 and  s.sav_email  = '" . $_POST['sav_email'] . "' and u.sc_utilisateur_acces  not in  ('Logistique','Admin','Coora')
                    order by s.`sav_id` DESC LIMIT 1");

                $result = $reponseT->fetchAll();

                if (count($result) > 0) {
                  $user_id = $result[0]['sc_utilisateur_id'];
                }

                $user_id = $resultUsers[$numRand - 1]['sc_utilisateur_id'];

                $sql = "INSERT INTO sav SET sc_utilisateur_id='" . $user_id . "', sav_nom='" . $_POST['sav_nom'] . "', sav_email='" . $_POST['sav_email'] . "', sav_cde='" . $_POST['sav_cde'] . "', sav_descriptif='" . $_POST['sav_descriptif'] . "', sav_intervenant='" . $sav_intervenant . "', sav_utilisateur_id='" . $sav_utilisateur_id . "', sav_date='" . date("Y-m-d") . "'";
                $bdd->exec($sql);

                $sav_id = $bdd->lastInsertId();

                //---------------------------
                //  SCRIPT D'UPLOAD
                //---------------------------
                $nbimg = 10; // Number of file input fields
                $extensions_ok = array('jpg', 'jpeg', 'png', 'gif');
                $target = __DIR__ . "/doc/";

                if (!is_dir($target)) {
                    mkdir($target, 0755, true);
                }

                for ($j = 1; $j <= $nbimg; $j++) {
                    $img = "sav_fichier" . $j;

                    if (isset($_FILES[$img]) && $_FILES[$img]['error'] == UPLOAD_ERR_OK) {
                        $nom_file = $_FILES[$img]['name'];
                        $taille = $_FILES[$img]['size'];
                        $tmp = $_FILES[$img]['tmp_name'];
                        $extension = pathinfo($nom_file, PATHINFO_EXTENSION);
                        $timestamp = date("dmY-His");
                        $nom_file2 = pathinfo($nom_file, PATHINFO_FILENAME) . "-" . $sav_id . "-" . $timestamp . "." . $extension;
                        $chemin = $target . $nom_file2;

                        $in = array('\\', ' ', 'à', 'á', 'â', 'ã', 'ä', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', '€', '&', ';', ',', '\'');
                        $out = array('', '-', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'euros', '', '', '', '');

                        if ($nom_file) {
                            $nom_traite = str_replace($in, $out, $nom_file2);

                            if (in_array(strtolower($extension), $extensions_ok)) {
                                $compressedImage = compressImage($tmp, 80); // 80% compression
                                if ($compressedImage !== false) {
                                    file_put_contents($chemin, $compressedImage);

                                    $sql = "UPDATE sav SET sav_fichier$j='" . $nom_traite . "' WHERE sav_id='" . $sav_id . "'";
                                    $bdd->exec($sql);
                                } else {
                                    echo "<p style='color: red;'>Erro ao comprimir o arquivo $j.</p>";
                                }
                            } else {
                                echo "<p style='color: red;'>Votre image ne comporte pas une extension valide! Extension valide: JPG, PNG, GIF.</p>";
                            }
                        }
                    }
                }

                // Send email
                $sujet = 'Votre SAV a été tranmis aux services Priximbattable';
                $sujet2 = 'Un nouveau SAV a été déclaré';
                $exp = $_POST['sav_email'];

                $message = "M/Mme " . $_POST['sav_nom'] . "<br /><br />Votre SAV a ete transmis aux services de Priximbattable.net, celui-ci sera pris en charge sous un delais de 48 à 72h.";
                $message .= "<br /><br />Le service client<br />Priximbattable.net";


                require 'PHPMailer/PHPMailerAutoload.php';

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'in-v3.mailjet.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->Username = 'e72c3e8d8252d7c9ea19393648809774';
                $mail->Password = '2d87f913b68eb79ec42b92bebdf44c4d';
                $mail->isHTML(true);
                $mail->setLanguage('en'); // Define o idioma como inglês

                $mail->From = 'sav@priximbattable.net';
                $mail->FromName = 'PRIXIMBATTABLE';
                $mail->addAddress('wm.priximbattable@gmail.com'); // Adiciona o destinatário
                $mail->addAddress($_POST['sav_email']); // Adiciona o destinatário
                $mail->addReplyTo('sav@priximbattable.net');
                $mail->Subject = $sujet;
                $mail->Body = $message;

                // Envia o e-mail e verifica se há erros
                if(!$mail->send()) {
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                  $msg = "Votre SAV a été transmis aux services Priximbattable";
                  echo "<p style='color: green;'>$msg</p>";
                }

                // Fecha a conexão SMTP e limpa a instância do PHPMailer
                $mail->SmtpClose();
                unset($mail);
            }
        }
    }
    ?>

    <footer class="page-footer">
        <!-- Footer content -->
    </footer>
</section>





        </div>



      </div>

    </section>

    <footer id="footer">


      <div class="container-fluid" style="background-color: #f1f1f1;">
        <div class="row">
          <div class="container pt-1">

            <div class="block_newsletter col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-md-5 col-xs-12">
                  <p id="block-newsletter-label" class="col-md-5 col-xs-12">Recevez nos offres spéciales</p>
                </div>
                <div class="col-md-7 col-xs-12">
                  <form action="https://priximbattable.net/#footer" method="post">
                    <div class="row">
                      <div class="col-xs-12">
                        <input class="btn btn-primary float-xs-right hidden-xs-down newAlu_buttonNewsletter" name="submitNewsletter" type="submit" value="S’abonner">
                        <input class="btn btn-primary float-xs-right hidden-sm-up" name="submitNewsletter" type="submit" value="ok">
                        <div class="input-wrapper">
                          <input name="email" type="email" value="" placeholder="Votre adresse e-mail" aria-labelledby="block-newsletter-label" class="newAlu_input">
                        </div>
                        <input type="hidden" name="action" value="0">
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 newAlu_txtNewsletter">
                        <p>Vous pouvez vous désinscrire à tout moment. Vous trouverez pour cela nos informations de contact dans les conditions d&#039;utilisation du site.</p>

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="block-social col-lg-4 col-md-12 col-sm-12">
              <ul>
              </ul>
            </div>



          </div>
        </div>
      </div>


      <div class="footer-container">

        <div class="footer-content">
          <div class="container">
            <div class="footerRow">

              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                <div class="sp_customhtml_1_161294429985393868
		  spfooterlinks">
                  <ul class="links">
                    <li>
                      <a href="https://priximbattable.net/6-cloture">Clôture</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/7-automatisme">Automatisme</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/8-porte-de-garage">Porte de garage</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/9-volet">Volet</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/10-fenetre">Fenêtre</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/11-porte-d-entree">Porte d&#039;entrée</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/12-verriere">Verrière</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/13-pergola">Pergola</a>
                    </li>
                  </ul>

                </div>

              </div>

              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                <div class="sp_customhtml_2_1612944300274743140
		  spfooterlinks">
                  <ul class="links">
                    <li>
                      <a href="https://priximbattable.net/83-abris-de-voiture">Abri de Voiture</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/50-portail">Portail</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/57-jardin">Jardin</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/105-store">Store</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/101-bonnes-affaires">Bonnes affaires</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/Sitemap">Sitemap</a>
                    </li>
                    <li>
                      <a href="https://priximbattable.net/nous-contacter">Nous contacter</a>
                    </li>
                  </ul>

                </div>

                <!-- <div id='pacmanmenu'>
                  <a href="/content/20-pacman" target="_blank"><img loading="lazy" src="/img/cms/PACMAN/pacman_1.gif" style="width: 68px; margin: 0; margin-top: -30px;" alt="" ></a>
                </div> -->
              </div>

              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
              <picture>
                <source srcset="/img/cms/home/map-fr.webp" type="image/webp">
                <img loading="lazy" alt="france" class="pais-rodape" src="/img/cms/home/map-fr.png" width="276" height="299">
              </picture>
              </div>

              <div class="contact-bg col-xs-12 col-sm-12 col-md-12 col-lg-3" style="padding-top: 30px;">
                <div class="contactinfo">
                  <div class="content-footer">

                    <div class="address">
                      <i class="material-icons">location_on</i>
                      <span>5 rue du Travail, 38230 Pont-De-Cheruy </span>
                    </div>

                    <div class="email">
                      <i class="material-icons">email</i>
                      <a href="mailto:toujoursun@priximbattable.net">toujoursun@priximbattable.net</a>
                    </div>

                    <div class="times">
                      <i class="material-icons">access_time</i><span>Horaires d'ouverture:</span> <br />
                      <span>Du Lundi au Jeudi : 9h/12h30 - 13h/18h<br>Le Vendredi : 9h/12h30 - 13h/17h30<br><br></span>
                    </div>

                    <div style="margin-top: 10px;">
                    <picture>
                <source srcset="/img/img_union/cssSprite_headerfooter.webp" type="image/webp">
                <img loading="lazy" class="spritecart img-fluid" src="/img/img_union/cssSprite_headerfooter.png" alt="Méthodes de Paiement">
              </picture>
                    </div>




                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <div class="container-fluid newAlu_barFooterLinks">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <a target="_blank" href="https://priximbattable.net/content/21-actualites-priximbattable">Actualité PrixImbattable</a>
                <a target="_blank" href="https://priximbattable.net/content/4-qui-sommes-nous">Qui Sommes-nous</a>
                <a target="_blank" href="https://priximbattable.net/service-client.php">Contact</a>
                <a target="_blank" href="https://priximbattable.net/sav/signaler_sav.php" class="highlight">Déclarer un SAV</a>
                <a target="_blank" href="https://priximbattable.net/content/8-cgv">CGV</a>
                <a target="_blank" href="https://priximbattable.net/content/6-politique-de-confidentialite">Politique de confidentialité</a>
                <a target="_blank" href="https://priximbattable.net/content/2-mentions-legales">Mentions légales</a>
                <a target="_blank" href="https://priximbattable.net/content/7-plan-de-situation">Plan de Situation</a>
              </div>
            </div>
          </div>


          <!--<div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 newAlu_copyright">
                &copy; Priximbattable < ?php echo(date("Y"));?>. Tout droits réservés.
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 newAlu_otherSite">
                <img loading="lazy" src="/img/flags/fr.jpg" alt="">
                <a href="https://www.priximbattable.net" target="_blank">www.priximbattable.net</a>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 newAlu_otherSite">
                <img loading="lazy" src="/img/flags/es.jpg" alt="">
                <a href="https://www.precioimbatible.net" target="_blank">www.precioimbatible.net</a>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 newAlu_otherSite">
                <img loading="lazy" src="/img/flags/pt.jpg" alt="">
                <a href="https://www.precoimbativel.net" target="_blank">www.precoimbativel.net</a>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 newAlu_otherSite">
                <img loading="lazy" src="/img/flags/de.jpg" alt="">
                <a href="https://www.preisverrueckt.net" target="_blank">www.preisverrueckt.net</a>
              </div>


            </div>
          </div>-->

          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 newAlu_copyright">
                © Priximbattable <span id=""><?php echo(date("Y"));?></span>. Tout droits réservés.
                <script>
                  // Obter o elemento onde o ano será exibido
                  var anoElemento = document.getElementById('anoAtual');

                  // Obter o ano atual
                  var anoAtual = new Date().getFullYear();

                  // Atualizar o texto dentro do elemento com o ano atual
                  anoElemento.textContent = anoAtual;
                </script>
              </div>


              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 footer-flags">
                <div class="footer-flags-image">
                  <picture>
                    <source srcset="/img/flags/fr.webp" type="image/webp">
                    <img loading="lazy" src="/img/flags/fr.png" alt="priximbattable.net" title="priximbattable.net">
                  </picture>
                </div>
                <div class="footer-flags-link">
                  <a href="https://www.priximbattable.net" target="_blank">www.priximbattable.net</a>
                </div>
              </div>


              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 footer-flags">
                <div class="footer-flags-image">
                  <picture>
                    <source srcset="/img/flags/es.webp" type="image/webp">
                    <img loading="lazy" src="/img/flags/es.png" alt="precioimbatible.net" title="precioimbatible.net">
                  </picture>
                </div>
                <div class="footer-flags-link">
                  <a href="https://www.precioimbatible.net" target="_blank">www.precioimbatible.net</a>
                </div>
              </div>


              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 footer-flags">
                <div class="footer-flags-image">
                  <picture>
                    <source srcset="/img/flags/pt.webp" type="image/webp">
                    <img loading="lazy" src="/img/flags/pt.png" alt="precoimbativel.net" title="precoimbativel.net">
                  </picture>
                </div>
                <div class="footer-flags-link">
                  <a href="https://www.precoimbativel.net" target="_blank">www.precoimbativel.net</a>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 footer-flags">
                <div class="footer-flags-image">
                  <picture>
                    <source srcset="/img/flags/ge.webp" type="image/webp">
                    <img loading="lazy" src="/img/flags/ge.png" alt="preisverrueckt.de" title="preisverrueckt.de">
                  </picture>
                </div>
                <div class="footer-flags-link">
                  <a href="https://www.preisverrueckt.de" target="_blank">www.preisverrueckt.de</a>
                </div>
              </div>
            </div>
          </div>





        </div>

        <div class="backtop">
          <a id="sp-totop" class="backtotop" href="#" title="Back to top">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalEmbedAluclass" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header" style="text-align: right;">
                <button id="modalEmbedAluclass_close" class="btn btn-danger">X</button>
              </div>
              <div class="modal-body">
                <div class="embed-responsive" style="padding-bottom: 56%;">
                  <iframe class="embed-responsive-item" id="codWatch" src="" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>







    </footer>

  </main>


  <!-- <script type="text/javascript" src="https://priximbattable.net/themes/classic/assets/cache/bottom-bd19a83924.js"></script>-->
  <script type="text/javascript" src="/themes/classic/assets/js/custom.js"></script>
  <script type="text/javascript" src="/themes/classic/assets/js/theme.js"></script>

  <script type="text/javascript" src="https://priximbattable.net/modules/alumenu/views/js/alumenu.js"></script>






</body>

</html>
