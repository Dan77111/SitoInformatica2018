<?php
include 'partials/db_connection.php';
include 'partials/functions.php';
session_start();

$_SESSION['paginaCorrente'] = "Accedi";
$_SESSION['message'] = "";

if (!$error_message) {
	if (isset($_POST['btnSalva'])) {

		$email      = text_filter_lowercase($_POST["regEmail"]);
		$password   = text_filter_encrypt($_POST["regPassword"]);

		$query = "SELECT password, ID_Utente, Tipo FROM tutenti WHERE email = '$email'";

		try{
			$select = mysqli_query($db_conn, $query);

			if ($select == null)
				throw new exception ("Utente non esistente");

			$dati = mysqli_fetch_array($select);
			if ($dati['password'] == $password){
				$_SESSION['utenteCorrente'] = $email;
				$_SESSION['idUtenteCorrente'] = $dati['ID_Utente'];
				$_SESSION['tipoUtente'] = $dati['Tipo'];
				header("Location: index.php");
			}
			else{
				throw new exception ("Password Errata");
			}

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
		include 'partials/login_form.html';
		?>
	</div>
	<?php
	if($error_message)
		include 'partials/modal.php';

	if($info_message)
		include 'partials/modal.php';
	?>
</body>
</html>
