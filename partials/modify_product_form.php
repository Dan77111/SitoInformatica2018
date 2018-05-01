<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--3-offset mdl-cell--2-offset-tablet mdl-cell--6-col mdl-cell--8-col-tablet">
		<div class="demo-card-square mdl-card mdl-shadow--2dp" style="width:100%">
			<div class="mdl-card__title mdl-card--expand">
				<h2 class="mdl-card__title-text">Aggiungi</h2>
			</div>
			<form class="form-horizontal" id="frmModificaProdotto" name="frmModificaProdotto" method="post" action="modify_product.php">
				<div class="mdl-card__supporting-text">
					<div id="lblNome" class="mdl-textfield mdl-js-textfield">
						<label for="regNome">Nome</label>
						<input class="mdl-textfield__input" type="text" id="prodNome" name="prodNome" value="<?php echo $prodottoAttuale['Nome'] ?>" required="" maxlength="50">
					</div>
					<br/>
					<div id="lblPrezzo" class="mdl-textfield mdl-js-textfield">
						<label for="prodPrezzo">Prezzo</label>
						<input class="mdl-textfield__input" type="number" id="prodPrezzo" name="prodPrezzo" value="<?php echo $prodottoAttuale['Prezzo'] ?>" required="" maxlength="50">
					</div>
					<br/>
					<div id="lblDescrizione" class="mdl-textfield mdl-js-textfield">
						<label for="prodDescrizione">Descrizione</label>
						<textarea class="mdl-textfield__input" type="text" rows="5" id="prodDescrizione" name="prodDescrizione" required="" maxlength="1000"><?php echo $prodottoAttuale['Descrizione'] ?></textarea>
					</div>
					<br/>
					<div id="lblCategoria" class="mdl-textfield mdl-js-textfield">
						<h5 style="color:rgb(97, 97, 97);font-size:16px;line-height:18px;font-weight:400;">Categoria</h5>
						<br style="line-height:30px"/>
						<div id="prodCategoria" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label">
							<select class="mdl-selectfield__select mdl-button mdl-button--raised mdl-button--accent" name="prodCategoria"  style="background-color:inherit;color:black;">
								<?php
								foreach ($categorie as $value) {
									?>
									<option <?php if ($prodottoAttuale["FK_Categoria"] == $value['ID_Categoria'] ){ echo "selected"; }  ?> value="<?php echo $value['ID_Categoria'] ?>"><?php echo $value['Nome'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit" id="btnModifica" name="btnModifica">
						Modifica
					</button>
				</div>
			</form>
		</div>
