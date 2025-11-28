<?php

// $info = array(
//   "host" => "cpanel2.goldyteam.com",
//   "usuario" => "priximbattabledev@priximbattable.goldylocks.eu",
//   "senha" => "@Priximbattable2021"
// );
// $fconnPrix = ftp_ssl_connect($info["host"],21);
// ftp_login($fconnPrix, $info["usuario"], $info["senha"]);
// // print_r($conn);
// ftp_pasv($fconnPrix, true);

// $git = ftp_nlist($fconnPrix,"/.git");
// $git_object = ftp_nlist($fconnPrix,"/.git/objects");
// $well_known = ftp_nlist($fconnPrix,"/.well-known");
// $well_known_pki_validation = ftp_nlist($fconnPrix,"/.well-known/pki-validation");
// $cfg = ftp_nlist($fconnPrix,"/cfg");
// $cgi_bin = ftp_nlist($fconnPrix,"/cgi-bin");
// $css = ftp_nlist($fconnPrix,"/css"); 
// $dist = ftp_nlist($fconnPrix,"/dist");
// $doc = ftp_nlist($fconnPrix,"/doc");
// $doc_resources = ftp_nlist($fconnPrix,"/doc/resources");
// $fonts = ftp_nlist($fconnPrix,"/fonts");
// $html = ftp_nlist($fconnPrix,"/html");
// $images = ftp_nlist($fconnPrix,"/images");
// $images_flags = ftp_nlist($fconnPrix,"/images/flags");
// $js = ftp_nlist($fconnPrix,"/js");
// $js_app = ftp_nlist($fconnPrix,"/js/app");
// $js_langs = ftp_nlist($fconnPrix,"/js/langs");
// $js_languages = ftp_nlist($fconnPrix,"/js/languages");
// $js_plugins = ftp_nlist($fconnPrix,"/js/plugins");
// $js_plugins_base64 = ftp_nlist($fconnPrix,"/js/plugins/base64");
// $js_plugins_cleanpaste = ftp_nlist($fconnPrix,"/js/plugins/cleanpaste");
// $js_plugins_colors = ftp_nlist($fconnPrix,"/js/plugins/colors");
// $js_plugins_colors_ui = ftp_nlist($fconnPrix,"/js/plugins/colors/ui");
// $js_plugins_colors_ui_sass = ftp_nlist($fconnPrix,"/js/plugins/colors/ui/sass");
// $js_plugins_emoji = ftp_nlist($fconnPrix,"/js/plugins/emoji");
// $js_plugins_insertaudio = ftp_nlist($fconnPrix,"/js/plugins/insertaudio");
// $js_plugins_noembed = ftp_nlist($fconnPrix,"/js/plugins/noembed");
// $js_plugins_pasteimage = ftp_nlist($fconnPrix,"/js/plugins/pasteimage");
// $js_plugins_preformatted = ftp_nlist($fconnPrix,"/js/plugins/preformatted");
// $js_plugins_table = ftp_nlist($fconnPrix,"/js/plugins/table");
// $js_plugins_template = ftp_nlist($fconnPrix,"/js/plugins/template");
// $js_plugins_upload = ftp_nlist($fconnPrix,"/js/plugins/upload");
// $js_ui = ftp_nlist($fconnPrix,"/js/ui");
// $js_ui_sass = ftp_nlist($fconnPrix,"/js/ui/sass");
// $nbproject = ftp_nlist($fconnPrix,"/nbproject");
// $pdf = ftp_nlist($fconnPrix,"/pdf");
// $php = ftp_nlist($fconnPrix,"/php");
// $php_classes = ftp_nlist($fconnPrix,"/php/classes");
// $php_font = ftp_nlist($fconnPrix,"/php/font");
// $php_phpexcel = ftp_nlist($fconnPrix,"/php/PHPExcel");
// $php_phpmailer = ftp_nlist($fconnPrix,"/php/phpmailer");
// $php_phpqrcode = ftp_nlist($fconnPrix,"/php/phpqrcode");
// $teste = ftp_nlist($fconnPrix,"/teste");
// $test = ftp_nlist($fconnPrix,"/tests");
// $tests_assets = ftp_nlist($fconnPrix,"/tests/assets");
// $tests_php = ftp_nlist($fconnPrix,"/tests/php");
// $uploads = ftp_nlist($fconnPrix,"/uploads");
// $uploads_tmp = ftp_nlist($fconnPrix,"/uploads/tmp");
// $xml = ftp_nlist($fconnPrix,"/xml");
// $enc_automaticas =  ftp_nlist($fconnPrix,"/php/update_encomendas_automaticas");


// if(in_array("/.git/index.php",$git)){
//   ftp_delete($fconnPrix,"/.git/index.php");
// }
// if(in_array("/.git/objects/index.php",$git_object)){
//   ftp_delete($fconnPrix,"/.git/objects/index.php");
// }
// if(in_array("/.well-known/index.php",$well_known)){
//   ftp_delete($fconnPrix,"/.well-known/index.php");
// }
// if(in_array("/.well-known/pki-validation/index.php",$well_known_pki_validation)){
//   ftp_delete($fconnPrix,"/.well-known/pki-validation/index.php");
// }
// if(in_array("/cfg/index.php",$cfg)){
//   ftp_delete($fconnPrix,"/cfg/index.php");
// }
// if(in_array("/cgi-bin/index.php",$cgi_bin)){
//   ftp_delete($fconnPrix,"/cgi-bin/index.php");
// }
// if(in_array("/css/index.php",$css)){
//   ftp_delete($fconnPrix,"/css/index.php");
// }
// if(in_array("/dist/index.php",$dist)){
//   ftp_delete($fconnPrix,"/dist/index.php");
// }
// if(in_array("/doc/index.php",$doc)){
//   ftp_delete($fconnPrix,"/doc/index.php");
// }
// if(in_array("/doc/resources/index.php",$doc_resources)){
//   ftp_delete($fconnPrix,"/doc/resources/index.php");
// }
// if(in_array("/fonts/index.php",$fonts)){
//   ftp_delete($fconnPrix,"/fonts/index.php");
// }
// if(in_array("/html/index.php",$html)){
//   ftp_delete($fconnPrix,"/html/index.php");
// }
// if(in_array("/images/index.php",$images)){
//   ftp_delete($fconnPrix,"/images/index.php");
// }
// if(in_array("/images/flags/index.php",$images_flags)){
//   ftp_delete($fconnPrix,"/images/flags/index.php");
// }
// if(in_array("/js/index.php",$js)){
//   ftp_delete($fconnPrix,"/js/index.php");
// }
// if(in_array("/js/app/index.php",$js_app)){
//   ftp_delete($fconnPrix,"/js/app/index.php");
// }
// if(in_array("/js/langs/index.php",$js_langs)){
//   ftp_delete($fconnPrix,"/js/langs/index.php");
// }
// if(in_array("/js/languages/index.php",$js_languages)){
//   ftp_delete($fconnPrix,"/js/languages/index.php");
// }
// if(in_array("/js/plugins/index.php",$js_plugins)){
//   ftp_delete($fconnPrix,"/js/plugins/index.php");
// }
// if(in_array("/js/plugins/base64/index.php",$js_plugins_base64)){
//   ftp_delete($fconnPrix,"/js/plugins/base64/index.php");
// }
// if(in_array("/js/plugins/cleanpaste/index.php",$js_plugins_cleanpaste)){
//   ftp_delete($fconnPrix,"/js/plugins/cleanpaste/index.php");
// }
// if(in_array("/js/plugins/colors/index.php",$js_plugins_colors)){
//   ftp_delete($fconnPrix,"/js/plugins/colors/index.php");
// }
// if(in_array("/js/plugins/colors/ui/index.php",$js_plugins_colors_ui)){
//   ftp_delete($fconnPrix,"/js/plugins/colors/ui/index.php");
// }
// if(in_array("/js/plugins/colors/ui/sass/index.php",$js_plugins_colors_ui_sass)){
//   ftp_delete($fconnPrix,"/js/plugins/colors/ui/sass/index.php");
// }
// if(in_array("/js/plugins/emoji/index.php",$js_plugins_emoji)){
//   ftp_delete($fconnPrix,"/js/plugins/emoji/index.php");
// }
// if(in_array("/js/plugins/insertaudio/index.php",$js_plugins_insertaudio)){
//   ftp_delete($fconnPrix,"/js/plugins/insertaudio/index.php");
// }
// if(in_array("/js/plugins/noembed/index.php",$js_plugins_noembed)){
//   ftp_delete($fconnPrix,"/js/plugins/noembed/index.php");
// }
// if(in_array("/js/plugins/pasteimage/index.php",$js_plugins_pasteimage)){
//   ftp_delete($fconnPrix,"/js/plugins/pasteimage/index.php");
// }
// if(in_array("/js/plugins/preformatted/index.php",$js_plugins_preformatted)){
//   ftp_delete($fconnPrix,"/js/plugins/preformatted/index.php");
// }
// if(in_array("/js/plugins/table/index.php",$js_plugins_table)){
//   ftp_delete($fconnPrix,"/js/plugins/table/index.php");
// }
// if(in_array("/js/plugins/template/index.php",$js_plugins_template)){
//   ftp_delete($fconnPrix,"/js/plugins/template/index.php");
// }
// if(in_array("/js/plugins/upload/index.php",$js_plugins_upload)){
//   ftp_delete($fconnPrix,"/js/plugins/upload/index.php");
// }
// if(in_array("/js/ui/index.php",$js_ui)){
//   ftp_delete($fconnPrix,"/js/ui/index.php");
// }
// if(in_array("/js/ui/sass/index.php",$js_ui_sass)){
//   ftp_delete($fconnPrix,"/js/ui/sass/index.php");
// }
// if(in_array("/nbproject/index.php",$nbproject)){
//   ftp_delete($fconnPrix,"/nbproject/index.php");
// }
// if(in_array("/pdf/index.php",$pdf)){
//   ftp_delete($fconnPrix,"/pdf/index.php");
// }
// if(in_array("/php/index.php",$php)){
//   ftp_delete($fconnPrix,"/php/index.php");
// }
// if(in_array("/php/classes/index.php",$php_classes)){
//   ftp_delete($fconnPrix,"/php/classes/index.php");
// }
// if(in_array("/php/font/index.php",$php_font)){
//   ftp_delete($fconnPrix,"/php/font/index.php");
// }
// if(in_array("/php/phpexcel/index.php",$php_phpexcel)){
//   ftp_delete($fconnPrix,"/php/phpexcel/index.php");
// }
// if(in_array("/php/phpmailer/index.php",$php_phpmailer)){
//   ftp_delete($fconnPrix,"/php/phpmailer/index.php");
// }
// if(in_array("/php/phpqrcode/index.php",$php_phpqrcode)){
//   ftp_delete($fconnPrix,"/php/phpqrcode/index.php");
// }
// if(in_array("/teste/index.php",$teste)){
//   ftp_delete($fconnPrix,"/teste/index.php");
// }
// if(in_array("/tests/index.php",$test)){
//   ftp_delete($fconnPrix,"/tests/index.php");
// }
// if(in_array("/tests/assets/index.php",$tests_assets)){
//   ftp_delete($fconnPrix,"/tests/assets/index.php");
// }
// if(in_array("/tests/php/index.php",$tests_php)){
//   ftp_delete($fconnPrix,"/tests/php/index.php");
// }
// if(in_array("/uploads/index.php",$uploads)){
//   ftp_delete($fconnPrix,"/uploads/index.php");
// }
// if(in_array("/uploads/tmp/index.php",$uploads_tmp)){
//   ftp_delete($fconnPrix,"/uploads/tmp/index.php");
// }
// if(in_array("/xml/index.php",$xml)){
//   ftp_delete($fconnPrix,"/xml/index.php");
// }
// if(in_array("/php/update_encomendas_automaticas/index.php",$enc_automaticas)){
//   ftp_delete($fconnPrix,"/php/update_encomendas_automaticas/index.php");
// }


// $local_file = __DIR__ ."/local_index.php";
// $handle = fopen($local_file, 'w');
// ftp_fget($fconnPrix,$handle,"/bk_index.php",FTP_BINARY);
// ftp_put($fconnPrix,"/index.php",__DIR__ ."/local_index.php",FTP_BINARY);
// ftp_close($fconnPrix);