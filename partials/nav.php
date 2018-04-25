<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	<header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
		<div class="mdl-layout--large-screen-only mdl-layout__header-row">
		</div>
		<div class="mdl-layout--large-screen-only mdl-layout__header-row">
			<h3><?php echo $_SESSION['paginaCorrente'] ?> </h3>
		</div>
		<div class="mdl-layout--large-screen-only mdl-layout__header-row">
		</div>
		<div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
			<a href="index.php" <?php
			if ($_SESSION['paginaCorrente'] == "Home") {
				echo 'style="color:white; font-size: 1.5em;"';
			}
			?> class="mdl-layout__tab">Home</a>
			<a href="products.php" <?php
			if (($_SESSION['paginaCorrente'] == "Prodotti") or ($_SESSION['paginaCorrente'] == "Dettagli") or ($_SESSION['paginaCorrente'] == "Aggiungi Prodotto")) {
				echo 'style="color:white; font-size: 1.5em;"';
			}
			?> class="mdl-layout__tab">Prodotti</a>
			<?php
			if (isset($_SESSION['utenteCorrente'])){
				?>
				<a href="cart.php" <?php
				if ($_SESSION['paginaCorrente'] == "Carrello") {
					echo 'style="color:white; font-size: 1.5em;"';
				}
				?> class="mdl-layout__tab">Carrello</a>
				<a href="wishlist.php" <?php
				if ($_SESSION['paginaCorrente'] == "Lista dei Desideri") {
					echo 'style="color:white; font-size: 1.5em;"';
				}
				?> class="mdl-layout__tab">Lista dei Desideri</a>
				<a href="orders.php" <?php
				if ($_SESSION['paginaCorrente'] == "Ordini") {
					echo 'style="color:white; font-size: 1.5em;"';
				}
				?> class="mdl-layout__tab">Ordini</a>
				<a href="index.php?logout" class="mdl-layout__tab">Logout</a>
				<?php
			} else {
				?>
				<a href="registration.php" <?php
				if ($_SESSION['paginaCorrente'] == "Registrati") {
					echo 'style="color:white; font-size: 1.5em;"';
				}
				?> class="mdl-layout__tab">Registrati</a>
				<a href="login.php" <?php
				if ($_SESSION['paginaCorrente'] == "Accedi") {
					echo 'style="color:white; font-size: 1.5em;"';
				}
				?> class="mdl-layout__tab">Accedi</a>
				<?php
			}
			?>
		</div>
	</header>
</div>
