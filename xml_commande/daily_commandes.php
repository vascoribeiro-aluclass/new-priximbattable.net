<?php
/**
*
* Get last commandes file from HTTP
* Goldyteam Portugal @2018
*
*
**/

// get all existing XML files at current folder
$orderFiles = glob(dirname(__FILE__)."/*.xml");

// set the content as XML
header("Content-type: text/xml");

// open and echo the content from the last XML file detected
echo file_get_contents($orderFiles[sizeof($orderFiles)-1]);