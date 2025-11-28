<?php

$ambiente = "PRODUCAO"; // SANDBOX ou PRODUCAO
$site     = "FR"; // FR, ES, PT

include("../database.php");

if ($mostra_erros == TRUE) {
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	error_reporting(E_ALL);
}

date_default_timezone_set("Europe/Paris");
header('Content-Type: text/html; charset=utf-8');

if ($site == "PT") {
	$nome_site = "precoimbativel";
	$id_cat_ndk = "103";
	$palavra_customizada_ndk = "Customized";
	$num_caract_descon = mb_strlen($palavra_customizada_ndk) + 5;
}elseif ($site == "ES") {
	$nome_site = "precioimbatible";
	$id_cat_ndk = "103";
	$palavra_customizada_ndk = "Customized";
	$num_caract_descon = mb_strlen($palavra_customizada_ndk) + 5;
}elseif ($site == "FR") {
	$nome_site = "priximbattable";
	$id_cat_ndk = "102";
	$palavra_customizada_ndk = "Personnalisé";
	$num_caract_descon = mb_strlen($palavra_customizada_ndk) + 5;
}

$periodo = @$_GET["periodo"];

if (!isset($periodo)) {
	echo "<h1>Período não informado.</h1>";
	exit;
}

$ordem   = @$_GET["ordem"]; 

$mes_atual = date("m");
$ano_atual = date("Y");

if ($periodo == "s") {
	// $data_fim = "2021-11-07 23:59:59";
	// $data_inicio = "2021-11-01 00:00:00";
	// $legenda_intervalo = substr($data_inicio, 0, 10)."_".substr($data_fim, 0, 10);
	$data_fim = date('Y-m-d', strtotime('-1 days', strtotime(date("Y-m-d"))))." 23:59:59";
	$data_inicio = date('Y-m-d', strtotime('-6 days', strtotime($data_fim)))." 00:00:00";
	$legenda_intervalo = date('Y-m-d', strtotime('-6 days', strtotime($data_fim)))."_".date('Y-m-d', strtotime('-1 days', strtotime(date("Y-m-d"))));
} elseif ($periodo == "m") {
	$mes = date("m");
	if ($mes == "01") {
		$mes = "12";
	} else {
		$mes = $mes - 1;
		if ($mes >= 1 || $mes <= 9) {
			$mes = "0".$mes;
		}
	}
	$ano = date("Y");
	$ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano));
	$data_inicio = $ano."-".$mes."-01 00:00:00";
	$data_fim = $ano."-".$mes."-".$ultimo_dia." 23:59:59";
	$legenda_intervalo = $ano."-".$mes."-01_".$ano."-".$mes."-".$ultimo_dia;
} else {
	echo "<h1>Período ".$periodo." não interpretado.</h1>";
	exit;
}

$select_sql = "SELECT * FROM ps_orders WHERE date_add>='$data_inicio' AND date_add<='$data_fim'";
$select_exec = $database->query($select_sql);

// Nome do Arquivo do Excel que será gerado
if (!isset($ordem)) {
	$arquivo = $nome_site.$sigla_base.".par-Qty_".$legenda_intervalo.".xls";
} else {
	$arquivo = $nome_site.$sigla_base.".par-Valeur_".$legenda_intervalo.".xls";
}

$tabela = "<table border='1'>";
$tabela .= "<tr>";
$tabela .= utf8_decode("<td colspan='3'><strong><span style='color: red;'>Prix Imbattable</span> - Rapport de vente par catégorie de produits</strong></td>");
$tabela .= "</tr>";

$tabela .= "<tr>";
$tabela .= utf8_decode("<td><strong>Période:</strong></td>");
$tabela .= utf8_decode("<td colspan='2'>".$data_inicio." à ".$data_fim."</td>");
$tabela .= "</tr>";

$tabela .= "<tr>";
if (!isset($ordem)) {
	$tabela .= "<td><strong>Cat. Prod.</strong></td>";
	$tabela .= "<td><strong>Qtd.</strong></td>";
	$tabela .= "<td><strong>Valeur Totale</strong></td>";
} else {
	$tabela .= "<td><strong>Cat. Prod.</strong></td>";
	$tabela .= "<td><strong>Valeur Totale</strong></td>";
	$tabela .= "<td><strong>Qtd.</strong></td>";
}
$tabela .= "</tr>";

$arrayCategoria = array();

// $i_exec = 1;

while ($pedidos = $select_exec->fetch_array()) {

	// produtos desta encomenda
	$id_order_now = $pedidos["id_order"];
	$sql_produtos = "SELECT * FROM ps_order_detail WHERE id_order='$id_order_now' AND id_shop='1'";
	$exec_produtos = $database->query($sql_produtos);

	while ($produtos = $exec_produtos->fetch_array()) {

		// id_categoria
		$id_product_now = $produtos["product_id"];
		$sql_categoria = "SELECT * FROM ps_product WHERE id_product='$id_product_now'";
		$exec_categoria = $database->query($sql_categoria);
		$categoria = $exec_categoria->fetch_array();

		// se a categoria for ndk_advanced_custom_fields
		if ($categoria["id_category_default"] == $id_cat_ndk) {

			// busca o nome do produto para extrair o produto base pelo nome
			$sql_nome_prod = "SELECT name FROM ps_product_lang WHERE id_product='$id_product_now'";
			$exec_nome_prod = $database->query($sql_nome_prod);
			$nome_prod = $exec_nome_prod->fetch_array();

			// se o produto base tiver 1 ou mais palavras customizada do ndk
			$repete = substr_count( ' '.$nome_prod[0].' ', $palavra_customizada_ndk );
			if ($repete == 1) {
				$nom = substr($nome_prod[0], $num_caract_descon);
			} else {
				for ($i=1; $i <= $repete; $i++) {
					if ($i == 1) {
						$nom = substr($nome_prod[0], $num_caract_descon);
					} else {
						$nom = substr($nova_frase, $num_caract_descon);
					}
					$nova_frase = $nom;
				}
			}

			$nom = str_replace("'", "\'", $nom);

			// sabendo o produto base, faz a consulta do id dele
			$sql_id_produto = "SELECT * FROM ps_product_lang WHERE id_lang='$id_lang' AND name='$nom'";
			$exec_id_produto = $database->query($sql_id_produto);
			$id_deste_produto = $exec_id_produto->fetch_array();
			$id_deste_produto_vez = $id_deste_produto["id_product"];

			// sabendo o id do produto base, faz a consulta do id da categoria
			$sql_id_cat_deste_prod = "SELECT id_category_default FROM ps_product WHERE id_product='$id_deste_produto_vez'";
			$exec_id_cat_deste_prod = $database->query($sql_id_cat_deste_prod);
			$id_cat_deste_prod = $exec_id_cat_deste_prod->fetch_array();

			$id_categoria = $id_cat_deste_prod[0];
		} else {
			$id_categoria = $categoria["id_category_default"];
			// busca o nome do produto para extrair o produto base pelo nome
			$sql_nome_prod = "SELECT name FROM ps_product_lang WHERE id_product='$id_product_now'";
			$exec_nome_prod = $database->query($sql_nome_prod);
			$nome_prod = $exec_nome_prod->fetch_array();
			$nom = $nome_prod[0];
		}

		// echo $i_exec." | ORDER ".$id_order_now." - PROD ".$id_product_now." (".@$id_deste_produto_vez.") - QTD ".$produtos["product_quantity"]." - CAT ".$id_categoria." - NOM ".$nom." - VALOR ".$produtos["total_price_tax_incl"]."<br>";
		// $i_exec++;

		// $indices_array = array_column($arrayCategoria, 'id_cat');
		// if (in_array($id_categoria, $indices_array)) {
		// 	#echo "<hr>$id_categoria era: <strong>".$arrayCategoria[$id_categoria]['valor']."</strong><hr>";
		// 	foreach ($arrayCategoria as $key => $value) {
		// 		if ($arrayCategoria[$key]['id_cat'] == $id_categoria) {
		// 			$qtd_atual = $arrayCategoria[$key]['qtd'];
		// 			$total = $qtd_atual + $produtos["product_quantity"];
		// 			$arrayCategoria[$key]['qtd'] = (int)$total;

		// 			$valor_atual = $arrayCategoria[$key]['valor'];
		// 			$valor = $valor_atual + $produtos["total_price_tax_incl"];
		// 			$arrayCategoria[$key]['valor'] = (float)$valor;
		// 		}
		// 	}
		// } else {
		// 	#echo "<hr>$id_categoria era: <strong>".$arrayCategoria[$id_categoria]['valor']."</strong><hr>";
		// 	$arrayCategoria[] = array(
		// 		'id_cat' => $id_categoria,
		// 		'qtd' => (int)$produtos["product_quantity"],
		// 		'valor' => (float)$produtos["total_price_tax_incl"]
		// 	);
		// }
		
		
		$indices_array = array_column($arrayCategoria, 'id_cat');

		if ($id_categoria != "21" && $id_categoria != "108" && $id_categoria != "117") {
			if (in_array($id_categoria, $indices_array)) {
				foreach ($arrayCategoria as $key => $value) {
					if ($arrayCategoria[$key]['id_cat'] == $id_categoria) {
						$qtd_atual = $arrayCategoria[$key]['qtd'];
						$total = $qtd_atual + $produtos["product_quantity"];
						$arrayCategoria[$key]['qtd'] = (int)$total;

						$valor_atual = $arrayCategoria[$key]['valor'];
						$valor = $valor_atual + $produtos["total_price_tax_incl"];
						$arrayCategoria[$key]['valor'] = (float)$valor;
					}
				}
			} else {
				$arrayCategoria[] = array(
					'id_cat' => $id_categoria,
					'qtd' => (int)$produtos["product_quantity"],
					'valor' => (float)$produtos["total_price_tax_incl"]
				);
			}
		} else {
			if ($id_deste_produto_vez == "48485" || $id_deste_produto_vez == "640023" || $id_deste_produto_vez == "68667" || $id_deste_produto_vez == "640024" || $id_deste_produto_vez == "68627" || $id_deste_produto_vez == "640025") {
				if (in_array($id_categoria, $indices_array)) {
					foreach ($arrayCategoria as $key => $value) {
						if ($arrayCategoria[$key]['id_cat'] == $id_categoria) {
							$qtd_atual = $arrayCategoria[$key]['qtd'];
							$total = $qtd_atual + $produtos["product_quantity"];
							$arrayCategoria[$key]['qtd'] = (int)$total;
	
							$valor_atual = $arrayCategoria[$key]['valor'];
							$valor = $valor_atual + $produtos["total_price_tax_incl"];
							$arrayCategoria[$key]['valor'] = (float)$valor;
						}
					}
				} else {
					$arrayCategoria[] = array(
						'id_cat' => $id_categoria,
						'qtd' => (int)$produtos["product_quantity"],
						'valor' => (float)$produtos["total_price_tax_incl"]
					);
				}
			}
		}
		
		#echo "<hr>$id_categoria agora: <strong>".$arrayCategoria[$id_categoria]['valor']."</strong><hr>";

	}

}

// reordenar o array pela quantidade
if (!isset($ordem)) {
	uasort($arrayCategoria, function ($a, $b) {
		return $a['qtd'] < $b['qtd'];
	});
} else {
	uasort($arrayCategoria, function ($a, $b) {
		return $a['valor'] < $b['valor'];
	});
}

foreach ($arrayCategoria as $key => $value) {
	$id_cat_vez = $arrayCategoria[$key]['id_cat'];
	$sql_nome_categoria = "SELECT name FROM ps_category_lang WHERE id_category='$id_cat_vez' AND id_lang='$id_lang'";
	$exec_nome_categoria = $database->query($sql_nome_categoria);
	$nome_categoria = $exec_nome_categoria->fetch_array();
	# echo $nome_categoria[0]." - ".$arrayCategoria[$key]['qtd']."<br>";
	$tabela .= "<tr>";
	if (!isset($ordem)) {
		$tabela .= "<td>".htmlentities($nome_categoria[0])."</td>";
		$tabela .= "<td>".$arrayCategoria[$key]['qtd']."</td>";
		$tabela .= "<td>".number_format($arrayCategoria[$key]['valor'], 2, '.', '')."</td>";
	} else {
		$tabela .= "<td>".htmlentities($nome_categoria[0])."</td>";
		$tabela .= "<td>".number_format($arrayCategoria[$key]['valor'], 2, '.', '')."</td>";
		$tabela .= "<td>".$arrayCategoria[$key]['qtd']."</td>";
	}
	$tabela .= "</tr>";
}

// Grava o arquivo na pasta FTP
file_put_contents($arquivo, $tabela);

$database->close();

// echo $tabela;

// echo "<pre>";
// print_r($arrayCategoria);
// echo "</pre>";

if (!isset($ordem)) {
	$url = $_SERVER['PHP_SELF']."?periodo=s&ordem=valor";
	header("Refresh: 0; url=$url");
} else {
	echo "<h1>Arquivo gerado com sucesso!</h1>";
}