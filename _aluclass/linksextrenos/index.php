<?php
$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");


$arrayXML = array ();

$arrayXML[] = array (
  'link' => "http://precoimbativel.net/modules/alufeedgooglexml/xml/feed_google.xml",
  'lang' => 'pt-pt',
);
$arrayXML[] = array (
  'link' => "http://precioimbatible.net/modules/alufeedgooglexml/xml/feed_google.xml",
  'lang' => 'es-es',
);
$arrayXML[] = array (
  'link' => "http://preisverrueckt.de/modules/alufeedgooglexml/xml/feed_google.xml",
  'lang' => 'de-de',
);

$database->query("DELETE FROM `sp_link_orther_sites`");

//link do arquivo xml
foreach($arrayXML as $valueXML){
  $xmlReader = new XMLReader();
  $item = array();
  $items = array();
  $xmlReader->open( $valueXML['link'] );
  $doc = new DOMDocument('1.0','UTF-8');
  while ($xmlReader->read()) {

      if ($xmlReader->nodeType == XMLReader::ELEMENT && $xmlReader->localName == "item") {
          // Load the XML under the <item> tag into SimpleXML
          $data = simplexml_import_dom($doc->importNode($xmlReader->expand(), true));
          $item = array();
          // Loop over the child elements from the 'g' namespace
          foreach  ($data->children("g", true) as $tag => $value )    {
              $tag = "g:".$tag;
              // If an item with that tag name already exists, convert it to an array of items
              if ( isset($item[$tag]) )   {
                  if ( !is_array($item[$tag]))    {
                      $item[$tag] = [$item[$tag]];
                  }
                  $item[$tag][] = (string)$value;
              }
              else    {
                  // For normal items, add in the value (as a string) to the array
                  $item[$tag] = (string) $value;
              }
          }
          // Store new item
          $items[] = $item;
      }
  }

  foreach($items as $valeu){
   $link = explode("?", $valeu['g:link']);
   $database->query("INSERT INTO `sp_link_orther_sites` (`id`, `link`, `lang`) VALUES ('".$valeu['g:id']."', '".$link[0]."', '".$valueXML['lang']."')");
  }

  $xmlReader->close();
}



?>
