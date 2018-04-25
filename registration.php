<?php
include 'partials/db_connection.php';
include 'partials/functions.php';

session_start();

$_SESSION['paginaCorrente'] = "Registrati";
$_SESSION['message'] = "";



if (!$error_message) {
	if (isset($_POST['btnSalva'])) {

		$cognome    = text_filter($_POST["regCognome"]);
		$nome       = text_filter($_POST["regNome"]);
		$data       = text_filter($_POST["regData"]);
		$email      = text_filter_lowercase($_POST["regEmail"]);
		$password   = text_filter_encrypt($_POST["regPassword"]);

		$query = "INSERT INTO tutenti (Cognome, Nome, DataDiNascita, Email, Password) VALUES('$cognome', '$nome', '$data', '$email', '$password')";
		$queryID = "SELECT ID_Utente FROM tutenti WHERE email = '$email'";
		try{
			$insert = mysqli_query($db_conn, $query);

			if ($insert==null)
			throw new exception ("Email già usata");

			$select = mysqli_query($db_conn, $queryID);
			$dati = mysqli_fetch_array($select);

			$_SESSION['idUtenteCorrente'] = $dati['ID_Utente'];
			$_SESSION['utenteCorrente'] = $email;
			$_SESSION['tipoUtente'] = 'U';
			header("Location: index.php");
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
		include 'partials/registration_form.html';

		if($error_message)
		include 'partials/modal.php';

		if($info_message)
		include 'partials/modal.php';
		?>
	</div>
</body>
</html>
