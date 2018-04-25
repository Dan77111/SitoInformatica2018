<?php
session_start();

$_SESSION['paginaCorrente'] = "Dettagli";
$_SESSION['idProdotto'] = $_GET['id'];

$id = $_SESSION['idProdotto'];
$idUtente = $_SESSION['idUtenteCorrente'];
include 'partials/db_connection.php';

if (isset($_POST['btnCarrello'])) {

	$query = "INSERT INTO tcarrelli (FK_Utente, FK_Prodotto) VALUES ('$idUtente', '$id')";

	try{
		$insert = mysqli_query($db_conn, $query);
		$_SESSION['info_message'] = true;
		$_SESSION['message'] = "Prodotto aggiunto con successo al carrello";
		header("Location: products.php");
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}

}
if (isset($_POST['btnListaDesideri'])) {

	$query = "INSERT INTO tlistadesideri (FK_Utente, FK_Prodotto) VALUES ('$idUtente', '$id')";

	try{
		$insert = mysqli_query($db_conn, $query);
		$_SESSION['info_message'] = true;
		$_SESSION['message'] = "Prodotto aggiunto con successo alla lista dei desideri";
		header("Location: products.php");
	} catch (Exception $e){
		$info_message = true;
		$_SESSION['message'] = $e->getMessage();
	}

}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<?php
	include 'partials/header.php';
	?>
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
	<div>
		<?php
		include 'partials/nav.php';

		$query = "SELECT p.Nome, p.Descrizione, p.Prezzo, c.Nome AS Categoria FROM tprodotti AS p, tcategorie AS c WHERE ( p.FK_Categoria = c.ID_Categoria ) AND (p.ID_Prodotto = $id)";
		$select = mysqli_query($db_conn, $query);

		$dati = mysqli_fetch_array($select);
		$nome = $dati['Nome'];
		$descrizione = $dati['Descrizione'];
		$prezzo = $dati['Prezzo'];
		$categoria = $dati['Categoria'];
		?>
	</div>
	<?php include 'partials/product_form.php';
	if($error_message)
	include 'partials/modal.php';

	if($info_message)
	include 'partials/modal.php';
	?>
</body>
</html>
