<?php
session_start();

$_SESSION['paginaCorrente'] = "Home";

if (isset($_GET['logout'])){
	session_destroy();
	session_start();
	$_SESSION['paginaCorrente'] = "Home";
}
include 'partials/db_connection.php';
include 'partials/functions.php';

$query = "SELECT p.ID_Prodotto, p.Nome, p.Prezzo FROM tprodotti AS p ORDER BY RAND() LIMIT 4";

try{
	$select = mysqli_query($db_conn, $query);

	$prodotti = array();

	while($prodotti[]=mysqli_fetch_array($select));
	array_pop($prodotti);

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

	echo '<div class="mdl-grid" style="margin:auto; width:80%;">';

	include "partials/product_list.php";

	echo '</div>';

	if($error_message)
	include 'partials/modal.php';

	if($info_message)
	include 'partials/modal.php';

	?>
</body>
</html>
