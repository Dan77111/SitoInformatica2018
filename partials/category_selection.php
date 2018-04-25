<div class="mdl-grid" style="margin:auto; width:80%;">
	<form name="frmSelezioneCategoria" method="post" action="products.php" style="padding-left: 10px;" class="mdl-cell--5-col mdl-cell--10-col-tablet mdl-cell--12-col-phone">
		<h5>Cerca per categoria e per nome</h5>
		<div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
			<select class="mdl-selectfield__select mdl-button mdl-button--raised mdl-button--accent" name="ricercaCategoria" style="background-color:inherit;color:black;">
				<option value="">Tutte</option>
				<?php
				foreach ($categorie as $value) {
					?>
					<?php if (isset($_POST["ricercaCategoria"])){ ?>
						<option <?php if ($_POST["ricercaCategoria"] == $value['ID_Categoria'] ){ echo "selected"; }  ?> value="<?php echo $value['ID_Categoria'] ?>"><?php echo $value['Nome'] ?></option>
					<?php } else { ?>
						<option value="<?php echo $value['ID_Categoria'] ?>"><?php echo $value['Nome'] ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<span style="display:inline-block; width:10px;"></span>
			<div id="lblNome" class="mdl-textfield mdl-js-textfield">
				<input class="mdl-textfield__input" type="text" value="<?php if (isset($_POST["ricercaNome"])){ echo $_POST['ricercaNome'];}?>" id="ricercaNome" name="ricercaNome" maxlength="50">
			</div>
			<span style="display:inline-block; width:10px;"></span>
			<button id="btnFiltra" name="btnFiltra" type="submit" class="mdl-button mdl-button--raised mdl-button--accent">
				Filtra
			</button>
		</div>
	</form>
</div>
