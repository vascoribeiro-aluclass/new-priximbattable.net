<?php 

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$host = "127.0.0.1"; // declarado aqui pois o IP é o mesmo para ambos

switch ($ambiente) {
	case 'SANDBOX':
		$mostra_erros = TRUE;
		$sigla_base = "-dev";
		if ($site == "PT") {
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'precoimbativelnet_dev',
				'database_user' => 'pi_user_dev_pt',
				'database_pass' => 'P4CzGv!iz58+?1$Y',
			);
		} elseif ($site == "ES") {
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'precioimbatiblenet_dev',
				'database_user' => 'pi_user_dev_es',
				'database_pass' => 'XpB1pN?-67@m=G9r',
			);
		} elseif ($site == "FR") {
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'priximbattfr_dev',
				'database_user' => 'pi_user_dev_fr',
				'database_pass' => 'Y@8Y7$m/nJ~ty3Z6',
			);
		}
		break;
	
	case 'PRODUCAO':
		$mostra_erros = FALSE;
		$sigla_base = "-";
		if ($site == "PT") {
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'precoimbativelnet',
				'database_user' => 'pi_user_pt',
				'database_pass' => 'Ej3WRK~z2K_es33v',
			);
		} elseif ($site == "ES") {
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'precioimbatiblenet',
				'database_user' => 'pi_user_es',
				'database_pass' => '8peDzfW-8C~VB7q24',
			);
		} elseif ($site == "FR") {
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'priximbattfr',
				'database_user' => 'priximbattfr',
				'database_pass' => '9HDeu_fH9sWN~6w4',
			);
		}
		break;
}

$database = new mysqli($infoconn['database_host'],$infoconn['database_user'],$infoconn['database_pass'],$infoconn['database_name']);

?>