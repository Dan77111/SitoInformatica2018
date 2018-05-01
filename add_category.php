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
$_SESSION['paginaCorrente'] = "Aggiungi Categoria";
$_SESSION['message'] = "";

if (!$error_message) {
	if (isset($_POST['btnCrea'])) {

		$nome         = text_filter($_POST["catNome"]);

		$query = "INSERT INTO tcategorie (Nome) VALUES ('$nome')";

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
		include 'partials/add_category_form.php';

		if($error_message)
		include 'partials/modal.php';

		if($info_message)
		include 'partials/modal.php';
		?>
	</div>
</body>
</html>
