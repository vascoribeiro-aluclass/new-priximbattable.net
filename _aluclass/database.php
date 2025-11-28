<?php 

$host_dev = "localhost";
$host = "127.0.0.1"; // declarado aqui pois o IP é o mesmo para ambos

switch ($ambiente) {
	case 'SANDBOX':
		$mostra_erros = TRUE;
		$sigla_base = "-dev";
		if ($site == "PT") {
			$id_lang = "2";
			$infoconn = array (
				'database_host' => $host_dev,
				'database_name' => 'devpriximbattpt',
				'database_user' => 'devpriximbattpt',
				'database_pass' => 'CfxLp5g65LP8',
			);
		} elseif ($site == "ES") {
			$id_lang = "2";
			$infoconn = array (
				'database_host' => $host_dev,
				'database_name' => 'devpriximbattes',
				'database_user' => 'devpriximbattes',
				'database_pass' => 'S2JX69sdzcQ9',
			);
		} elseif ($site == "FR") {
			$id_lang = "1";
			$infoconn = array (
				'database_host' => $host_dev,
				'database_name' => 'devpriximbattfr',
				'database_user' => 'devpriximbattfr',
				'database_pass' => 'V9kEV3vHp9n4',
			);
		}
		break;
	
	case 'PRODUCAO':
		$mostra_erros = FALSE;
		$sigla_base = "";
		if ($site == "PT") {
			$id_lang = "2";
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'priximbattpt',
				'database_user' => 'priximbattpt',
				'database_pass' => 'uUN6hLs2d27M',
			);
		} elseif ($site == "ES") {
			$id_lang = "2";
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'priximbattes',
				'database_user' => 'priximbattes',
				'database_pass' => 'E6x92aN9JeSn',
			);
		} elseif ($site == "FR") {
			$id_lang = "1";
			$infoconn = array (
				'database_host' => $host,
				'database_name' => 'priximbattfr',
				'database_user' => 'priximbattfr',
				'database_pass' => 'hu9wL5yB8YH4',
			);
		}
		break;
}

$database = new mysqli($infoconn['database_host'],$infoconn['database_user'],$infoconn['database_pass'],$infoconn['database_name']);

?>
