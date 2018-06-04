<form class="form-horizontal" id="frmCarrello" name="frmCarrello" method="post" action="cart.php">
	<div style="width:50%;margin:40px auto;">
		<table style="width:100%;" class="mdl-data-table mdl-data-table--selectable mdl-shadow--2dp">
			<thead class="mdl-color--accent">
				<tr>
					<th class="mdl-data-table__cell--non-numeric mdl-color-text--accent-contrast">Nome</th>
					<th class="mdl-data-table__cell--non-numeric mdl-color-text--accent-contrast">Prezzo</th>
					<th class="mdl-color-text--accent-contrast">Rimuovi</th>
				</tr>
			</thead>
			<tbody>
				<?php $totale = 0; ?>
				<?php foreach ($prodotti as $value) { ?>
					<?php $totale += $value['Prezzo']; ?>
					<tr>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['Nome'] ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['Prezzo'] ?>€</td>
						<td><button style="padding:0px; background-color:inherit;border:0px;" type="submit" id="btnRimuovi<?php echo $value['ID_Carrello'] ?>" name="btnRimuovi" value="<?php echo $value['ID_Carrello'] ?>" class="material-icons">cancel</button></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr style="font-weight:900;">
					<td class="mdl-data-table__cell--non-numeric">Totale</td>
					<td class="mdl-data-table__cell--non-numeric"><?php echo $totale ?>€</td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		<button type="submit" id="btnAcquisto" name="btnAcquisto" style="margin-top:5px;" class="mdl-button mdl-color--accent mdl-color-text--accent-contrast">Acquista</button>
	</div>
</form>
