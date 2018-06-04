<?php
session_start();
if (!isset($_SESSION['idUtenteCorrente'])){
	header("Location: index.php");
}
$_SESSION['paginaCorrente'] = "Lista dei Desideri";

$idUtente = $_SESSION['idUtenteCorrente'];
include 'partials/db_connection.php';
include 'partials/functions.php';
$query = "SELECT l.ID_Lista, p.ID_Prodotto, p.Nome, p.Prezzo FROM tprodotti AS p JOIN tlistadesideri AS l ON (l.FK_Prodotto = p.ID_Prodotto) WHERE ( l.FK_Utente = '$idUtente')";

try {
	$select = mysqli_query($db_conn, $query);

	$prodotti = array();

	while($prodotti[]=mysqli_fetch_array($select));
	array_pop($prodotti);
} catch (Exception $e){
	$info_message = true;
	$_SESSION['message'] = $e->getMessage();
}

if (isset($_POST['btnAggiungiAlCarrello'])) {
	foreach ($prodotti as $value) {
		$idProdotto = $value['ID_Prodotto'];
		$queryAcquisto = "INSERT INTO tcarrelli (FK_Utente, FK_Prodotto) VALUES ('$idUtente', '$idProdotto')";
		try {
			$insert = mysqli_query($db_conn, $queryAcquisto);
		} catch (Exception $e){
			$info_message = true;
			$_SESSION['message'] = $e->getMessage();
		}
	}
	$queryRimozioneLista = "DELETE FROM tlistadesideri WHERE ( FK_Utente = '$idUtente' )";
	try {
		$delete = mysqli_query($db_conn, $queryRimozioneLista);
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}
	header("Location: cart.php");
}

if (isset($_POST['btnRimuovi'])) {
	$idLista = $_POST['btnRimuovi'];
	$query = "DELETE FROM tlistadesideri WHERE (ID_Lista = '$idLista')";
	try {
		$delete = mysqli_query($db_conn, $query);
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}
	header("Location: wishlist.php");
	break;
}
if (isset($_POST['btnAggiungi'])) {
	$temp = explode(',', $_POST['btnAggiungi']);
	$idProdotto = $temp[0];
	$idLista = $temp[1];
	$query = "INSERT INTO tcarrelli (FK_Utente, FK_Prodotto) VALUES ('$idUtente', '$idProdotto')";
	try {
		$insert = mysqli_query($db_conn, $query);
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}
	$query = "DELETE FROM tlistadesideri WHERE (ID_Lista = '$idLista')";
	try {
		$delete = mysqli_query($db_conn, $query);
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}
	header("Location: wishlist.php");
	break;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<?php include 'partials/header.php' ?>
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
	<?php
	include 'partials/nav.php';
	include 'partials/wishlist_form.php';

	if($error_message)
	include 'partials/modal.php';

	if($info_message)
	include 'partials/modal.php';
	?>
</body>
</html>
