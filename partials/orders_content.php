<div style="width:50%;margin:40px auto;">
	<?php $ultimaData = null; ?>
	<?php foreach ($ordini as $value) {?>
		<?php if ($ultimaData == $value['DataOrdine']){ ?>
			<tr>
				<td class="mdl-data-table__cell--non-numeric"><?php echo $value['Nome'] ?></td>
				<td><?php echo $value['Prezzo'] ?>€</td>
			</tr>
		<?php } else { ?>
		</tbody>
	</table>
	<table style="width:100%;margin-bottom:40px;" class="mdl-data-table mdl-data-table--selectable mdl-shadow--2dp">
		<caption style="caption-side:top;width:100%;" class="mdl-color--accent mdl-color-text--accent-contrast"><?php echo $value['DataOrdine'] ?></caption>
		<thead>
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Nome</th>
				<th>Prezzo</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="mdl-data-table__cell--non-numeric"><?php echo $value['Nome'] ?></td>
				<td><?php echo $value['Prezzo'] ?>€</td>
			</tr>

			<?php $ultimaData = $value['DataOrdine'] ?>
		<?php } ?>
	<?php } ?>
</div>
