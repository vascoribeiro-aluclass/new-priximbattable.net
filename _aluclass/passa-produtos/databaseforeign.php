<?php 

$host = "127.0.0.1"; // declarado aqui pois o IP é o mesmo para ambos

switch ($ambienteforeign) {
	case 'SANDBOX':
		$mostra_erros = TRUE;
		$sigla_base = "-dev";
		if ($siteforeign== "PT") {
			$id_langforeign = "2";
			$infoconnforeign = array (
				'database_host' => $host_dev,
				'database_name' => 'devpriximbattpt',
				'database_user' => 'devpriximbattpt',
				'database_pass' => 'veRe7abeZyqA',
			);
		} elseif ($siteforeign== "ES") {
			$id_langforeign = "2";
			$infoconnforeign = array (
				'database_host' => $host_dev,
				'database_name' => 'devpriximbattes',
				'database_user' => 'devpriximbattes',
				'database_pass' => 'PaNUqYQUveqY',
			);
		} elseif ($siteforeign== "FR") {
			$id_langforeign = "1";
			$infoconnforeign = array (
				'database_host' => $host_dev,
				'database_name' => 'devpriximbattfr',
				'database_user' => 'devpriximbattfr',
				'database_pass' => 'vajahaXaJENA',
			);
		}
		break;
	
	case 'PRODUCAO':
		$mostra_erros = FALSE;
		$sigla_base = "";
		if ($siteforeign== "PT") {
			$id_langforeign = "2";
			$infoconnforeign = array (
				'database_host' => $host,
				'database_name' => 'precoimbativelnet',
				'database_user' => 'pi_user_pt',
				'database_pass' => 'Ej3WRK~z2K_es33v',
			);
		} elseif ($siteforeign== "ES") {
			$id_langforeign = "2";
			$infoconnforeign = array (
				'database_host' => $host,
				'database_name' => 'precioimbatiblenet',
				'database_user' => 'pi_user_es',
				'database_pass' => '8peDzfW-8C~VB7q24',
			);
		} elseif ($siteforeign== "FR") {
			$id_langforeign = "1";
			$infoconnforeign = array (
				'database_host' => $host,
				'database_name' => 'priximbattablenet',
				'database_user' => 'pi_user_fr',
				'database_pass' => '9HDeu_fH9sWN~6w4',
			);
		}
		break;
}

$databaseforeign = new mysqli($infoconnforeign['database_host'],$infoconnforeign['database_user'],$infoconnforeign['database_pass'],$infoconnforeign['database_name']);

?>