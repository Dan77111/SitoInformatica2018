<?php
session_start();

$_SESSION['paginaCorrente'] = "Prodotti";

?>

<!DOCTYPE html>
<html lang="it">
<head>
	<?php include 'partials/header.php' ?>
	<?php include 'partials/db_connection.php' ?>
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
	<?php
	include 'partials/nav.php';
	//Leggo i prodotti dal DB
	$queryProdotti = "SELECT p.ID_Prodotto, p.Nome, p.Prezzo FROM tprodotti AS p INNER JOIN tcategorie AS c ON p.FK_Categoria = c.ID_Categoria WHERE (1=1)";

	if (isset($_POST['ricercaCategoria'])){
		if ($_POST['ricercaCategoria'] != ""){
			$categoria = $_POST['ricercaCategoria'];
			$queryProdotti = $queryProdotti." AND ( c.ID_Categoria = '$categoria' )";
		}
	}

	if (isset($_POST['ricercaNome'])){
		if ($_POST['ricercaNome'] != ""){
			$nome = $_POST['ricercaNome'];
			$queryProdotti = $queryProdotti." AND ( p.Nome LIKE '%$nome%' )";
		}
	}

	$queryCategorie = "SELECT ID_Categoria, Nome FROM tcategorie";

	try{
		$select = mysqli_query($db_conn, $queryProdotti);

		$prodotti = array();

		while($prodotti[]=mysqli_fetch_array($select));
		array_pop($prodotti);

		$select = mysqli_query($db_conn, $queryCategorie);

		$categorie = array();

		while($categorie[]=mysqli_fetch_array($select));
		array_pop($categorie);
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}
	?>

	<?php
	include "partials/category_selection.php";

	echo '<div class="mdl-grid" style="margin:auto; width:80%;">';

	if (isset($_SESSION['utenteCorrente'])){
		if ($_SESSION['tipoUtente'] == 'A'){
			include 'partials/add_product_card.php';
			include 'partials/add_category_card.php';
		}
	}

	include "partials/product_list.php";

	echo '</div>';

	if($info_message or isset($_SESSION['info_message'])){
		include 'partials/modal.php';
		$_SESSION['info_message'] = null;
	}

	if($error_message)
	include 'partials/modal.php';

	?>
</body>
</html>
