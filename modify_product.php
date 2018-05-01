<?php
include 'partials/db_connection.php';
include 'partials/functions.php';

session_start();
if (!isset($_SESSION['idUtenteCorrente'])){
	header("Location: index.php");
}
if ($_SESSION['tipoUtente'] != "A"){
	header("Location: index.php");
}

if (!isset($_SESSION['idProdotto'])){
	header("Location: index.php");
}

$idProdotto = $_SESSION['idProdotto'];

$_SESSION['paginaCorrente'] = "Modifica Prodotto";
$_SESSION['message'] = "";

if (!$error_message) {
	if (isset($_POST['btnModifica'])) {

		$nome         = text_filter($_POST["prodNome"]);
		$prezzo       = text_filter($_POST["prodPrezzo"]);
		$descrizione  = text_filter($_POST["prodDescrizione"]);
		$categoria    = $_POST['prodCategoria'];

		$queryModifica = "UPDATE tprodotti SET Nome = '$nome', Prezzo = '$prezzo', Descrizione = '$descrizione', FK_Categoria = '$categoria' WHERE (ID_Prodotto = '$idProdotto')";

		try{
			$update = mysqli_query($db_conn, $queryModifica);

			header("Location: product.php?id=$idProdotto");
		} catch (Exception $e){
			$info_message = true;
			$_SESSION['message'] = $e->getMessage();
		}
	}
}

$queryProdottoAttuale = "SELECT Nome, Prezzo, Descrizione, FK_Categoria FROM tprodotti WHERE (ID_Prodotto = '$idProdotto') ";
$queryCategorie = "SELECT ID_Categoria, Nome FROM tcategorie";

try{
	$select = mysqli_query($db_conn, $queryProdottoAttuale);

	$prodottoAttuale = mysqli_fetch_array($select);

	$select = mysqli_query($db_conn, $queryCategorie);

	$categorie = array();

	while($categorie[]=mysqli_fetch_array($select));

	array_pop($categorie);

} catch (Exception $e){
	$info_message = true;
	$_SESSION['message'] = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<?php include 'partials/header.php'; ?>
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
	<div>
		<?php include 'partials/nav.php'; ?>
	</div>
	<div>
		<?php
		include 'partials/modify_product_form.php';

		if($error_message)
		include 'partials/modal.php';

		if($info_message)
		include 'partials/modal.php';
		?>
	</div>
</body>
</html>
