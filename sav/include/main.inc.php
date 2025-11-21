<?php session_start();

/** * On déconnecte l'utilisateur */
if($_GET['action'] == 'deconnexion') {
		session_destroy();
}
/**
 * On redirige l'utilisateur si il n'est pas connecté
 */	
if(basename($_SERVER["PHP_SELF"]) <> "index.php") {
	// On vérifie que l'on loggé au niveau de l'admin
	if(!$_SESSION['user']) {
	header( "Location: index.php");
	}
}

function dtatoa($dt) //date francais to mysql (anglais)
{
	//if (!ereg("^ *[0-3]?[0-9]\/[0-1]?[0-9]\/([0-9]{2})?[0-9]{2} *$",$dt)) return false;
	$dt=ereg_replace(" ","",$dt);
	$tb=split("\/",$dt);
	if (strlen($tb[2])==2)
	{
		if ($tb[2]>50) {
		$tb[2]+=1900;
		} else {
		$tb[2]+=2000;
		}
	}
	if (strlen($tb[0])==1) $tb[0]="0".$tb[0];
	if (strlen($tb[1])==1) $tb[1]="0".$tb[1];
	return $tb[2]."-".$tb[0]."-".$tb[1];
}


function dtftoa($dt) //date francais to mysql (anglais)
{
	if (!ereg("^ *[0-3]?[0-9]\/[0-1]?[0-9]\/([0-9]{2})?[0-9]{2} *$",$dt)) return false;
	$dt=ereg_replace(" ","",$dt);
	$tb=split("\/",$dt);
	if (strlen($tb[2])==2)
	{
		if ($tb[2]>50) {
		$tb[2]+=1900;
		} else {
		$tb[2]+=2000;
		}
	}
	if (strlen($tb[0])==1) $tb[0]="0".$tb[0];
	if (strlen($tb[1])==1) $tb[1]="0".$tb[1];
	return $tb[2]."-".$tb[1]."-".$tb[0];
}

function dtatof($dt)
{
	$dt=ereg_replace(" ?([0-9]{2}[:]){2}[0-9]{2} *$","",$dt);
	if (!ereg("^ *[0-9]{4}\-[01]?[0-9]\-[0-3]?[0-9] *$",$dt)) return false;
	$dt=ereg_replace(" ","",$dt);
	$tb=split("-",$dt);
	if (strlen($tb[2])==1) $tb[2]="0".$tb[0];
	if (strlen($tb[1])==1) $tb[1]="0".$tb[1];
	return $tb[2]."/".$tb[1]."/".$tb[0];	
}
function mychain($s)
{ 
	$s = ereg_replace("'","'",$s);
	return ereg_replace("'","\'",$s);
}
?>