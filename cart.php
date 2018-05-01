<?php
session_start();
if (!isset($_SESSION['idUtenteCorrente'])){
	header("Location: index.php");
}
$_SESSION['paginaCorrente'] = "Carrello";
$idUtente = $_SESSION['idUtenteCorrente'];
include 'partials/db_connection.php';
include 'partials/functions.php';
$query = "SELECT c.ID_Carrello, p.ID_Prodotto, p.Nome, p.Prezzo FROM tprodotti AS p JOIN tcarrelli AS c ON (c.FK_Prodotto = p.ID_Prodotto) WHERE ( c.FK_Utente = '$idUtente')";

try {
	$select = mysqli_query($db_conn, $query);

	$prodotti = array();

	while($prodotti[]=mysqli_fetch_array($select));
	array_pop($prodotti);
} catch (Exception $e){
	$info_message = true;
	$_SESSION['message'] = $e->getMessage();
}

if (isset($_POST['btnAcquisto'])) {
	$data = date("Y/m/d");
	foreach ($prodotti as $value) {
		$idProdotto = $value['ID_Prodotto'];
		$queryAcquisto = "INSERT INTO tordini (FK_Utente, FK_Prodotto, DataOrdine) VALUES ('$idUtente', '$idProdotto', '$data' )";
		try {
			$insert = mysqli_query($db_conn, $queryAcquisto);
		} catch (Exception $e){
			$info_message = true;
			$_SESSION['message'] = $e->getMessage();
		}
	}
	$queryRimozioneCarrello = "DELETE FROM tcarrelli WHERE ( FK_Utente = '$idUtente' )";
	try {
		$delete = mysqli_query($db_conn, $queryRimozioneCarrello);
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}
	header("Location: orders.php");
}

foreach ($_POST as $key => $value) {
	if (startsWith($key, 'btnRimuovi')){
		$intero = $key;
		$radice = 'btnRimuovi' ;
		$idCarrello = (int)str_replace($radice, '', $intero);
		$query = "DELETE FROM tcarrelli WHERE (ID_Carrello = '$idCarrello')";
		try {
			$delete = mysqli_query($db_conn, $query);
		} catch (Exception $e){
			$info_message = true;
			$_SESSION['message'] = $e->getMessage();
		}
		header("Location: cart.php");
		break;
	}
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
	include 'partials/cart_form.php';

	if($error_message)
	include 'partials/modal.php';

	if($info_message)
	include 'partials/modal.php';
	?>
</body>
</html>
