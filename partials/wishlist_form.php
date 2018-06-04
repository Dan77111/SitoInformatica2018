<form class="form-horizontal" id="frmListaDesideri" name="frmListaDesideri" method="post" action="wishlist.php">
	<div style="width:50%;margin:40px auto;">
		<table style="width:100%;" class="mdl-data-table mdl-data-table--selectable mdl-shadow--2dp">
			<thead class="mdl-color--accent">
				<tr>
					<th class="mdl-data-table__cell--non-numeric mdl-color-text--accent-contrast">Nome</th>
					<th class="mdl-data-table__cell--non-numeric mdl-color-text--accent-contrast">Prezzo</th>
					<th class="mdl-color-text--accent-contrast">Rimuovi</th>
					<th class="mdl-color-text--accent-contrast">Aggiungi Al Carrello</th>
				</tr>
			</thead>
			<tbody>
				<?php $totale = 0; ?>
				<?php foreach ($prodotti as $value) { ?>
					<?php $totale += $value['Prezzo']; ?>
					<tr>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['Nome'] ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['Prezzo'] ?>€</td>
						<td><button style="padding:0px; background-color:inherit;border:0px;" type="submit" id="btnRimuovi<?php echo $value['ID_Lista'] ?>" name="btnRimuovi" value="<?php echo $value['ID_Lista'] ?>" class="material-icons">cancel</button></td>
						<td><button style="padding:0px; background-color:inherit;border:0px;" type="submit" id="btnAggiungi<?php echo $value['ID_Prodotto'].','.$value['ID_Lista'] ?>" name="btnAggiungi" value="<?php echo $value['ID_Prodotto'].','.$value['ID_Lista'] ?>" class="material-icons">add_circle</button></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<button type="submit" id="btnAggiungiAlCarrello" name="btnAggiungiAlCarrello" style="margin-top:5px;" class="mdl-button mdl-color--accent mdl-color-text--accent-contrast">Aggiungi tutto al carrello</button>
	</div>
</form>
