<?php
include 'partials/db_connection.php';
include 'partials/functions.php';

session_start();

$_SESSION['paginaCorrente'] = "Aggiungi Prodotto";
$_SESSION['message'] = "";

$queryCategorie = "SELECT ID_Categoria, Nome FROM tcategorie";

try{

	$select = mysqli_query($db_conn, $queryCategorie);

	$categorie = array();

	while($categorie[]=mysqli_fetch_array($select));

	array_pop($categorie);

} catch (Exception $e){
	$info_message = true;
	$_SESSION['message'] = $e->getMessage();
}

if (!$error_message) {
	if (isset($_POST['btnCrea'])) {

		$nome         = text_filter($_POST["prodNome"]);
		$prezzo       = text_filter($_POST["prodPrezzo"]);
		$descrizione  = text_filter($_POST["prodDescrizione"]);
		$categoria    = $_POST['prodCategoria'];

		$query = "INSERT INTO tprodotti (Nome, Prezzo, Descrizione, FK_Categoria) VALUES('$nome', '$prezzo', '$descrizione', '$categoria')";

		try{
			$insert = mysqli_query($db_conn, $query);

			header("Location: products.php");
		} catch (Exception $e){
			$info_message = true;
			$_SESSION['message'] = $e->getMessage();
		}
	}
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
		include 'partials/add_product_form.php';

		if($error_message)
		include 'partials/modal.php';

		if($info_message)
		include 'partials/modal.php';
		?>
	</div>
</body>
</html>
