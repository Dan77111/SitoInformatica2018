<?php
foreach ($prodotti as $value) {
	?>
	<div class="demo-card-wide demo-card-event mdl-color--accent mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--10-col-tablet mdl-cell--10-col-phone ">
		<div class="mdl-card__title mdl-card--expand">
			<h3>
				<?php echo $value['Nome']; ?>
			</h3>
		</div>
		<div class="mdl-card__actions mdl-color--accent mdl-card--border">
			<a class="mdl-button mdl-button--colored" href="product.php?id=<?php echo $value['ID_Prodotto']; ?>">
				Dettagli
			</a>
			<div class="mdl-layout-spacer"></div>
			<a class="mdl-button mdl-button--colored" style="padding-right:5%">
				<?php echo $value['Prezzo']; ?>
				€
			</a>
		</div>
	</div>
<?php } ?>
