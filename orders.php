<?php
session_start();

$_SESSION['paginaCorrente'] = "Ordini";
$idUtente = $_SESSION['idUtenteCorrente'];
include 'partials/db_connection.php';
include 'partials/functions.php';

$query = "SELECT p.Nome, p.Prezzo, o.DataOrdine FROM tprodotti AS p JOIN tordini AS o ON (o.FK_Prodotto = p.ID_Prodotto) WHERE ( o.FK_Utente = '$idUtente') ORDER BY o.DataOrdine";

try {
	$select = mysqli_query($db_conn, $query);

	$ordini = array();

	while($ordini[]=mysqli_fetch_array($select));
	array_pop($ordini);
} catch (Exception $e){
	$info_message = true;
	$_SESSION['message'] = $e->getMessage();
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
	include 'partials/orders_content.php';
	?>
</body>
</html>
