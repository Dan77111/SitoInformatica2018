
<form class="form-horizontal" id="frmProdotto" name="frmProdotto" method="post" action="product.php?id=<?php echo $_SESSION['idProdotto'] ?>">
	<div class="mdl-cell mdl-color-text--accent-contrast" style="width:70%;margin:auto;">
		<div class="mdl-color--accent">
			<header class="mdl-color--primary" style="margin-bottom:0px;">
				<h3 style="font-size:30px;padding:15px;"><?php echo $nome ?></h3>
			</header>
			<div style="margin-left:10px;">
				<p style="font-size:20px;">Categoria: <?php echo $categoria ?></p>
				<hr>
				<p>Descrizione:</p>
				<p><?php echo $descrizione ?></p><br>
				<p><?php echo $prezzo ?>€</p>
			</div>
			<button type="submit" id="btnCarrello" name="btnCarrello" style="margin:5px;" class="mdl-button mdl-color--primary mdl-color-text--primary-contrast">Aggiungi al carrello</button>
			<button type="submit" id="btnListaDesideri" name="btnListaDesideri" style="margin:5px;" class="mdl-button mdl-color--primary mdl-color-text--primary-contrast">Aggiungi alla lista dei desideri</button>
		</div>
	</div>
</form>
