<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--3-offset mdl-cell--2-offset-tablet mdl-cell--6-col mdl-cell--8-col-tablet">
		<div class="demo-card-square mdl-card mdl-shadow--2dp" style="width:100%">
			<div class="mdl-card__title mdl-card--expand">
				<h2 class="mdl-card__title-text">Aggiungi</h2>
			</div>
			<form class="form-horizontal" id="frmCreaCategoria" name="frmCreaCategoria" method="post" action="add_category.php">
				<div class="mdl-card__supporting-text">
					<div id="lblNome" class="mdl-textfield mdl-js-textfield">
						<label for="regNome">Nome</label>
						<input class="mdl-textfield__input" type="text" id="catNome" name="catNome" required="" maxlength="50">
					</div>
				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit" id="btnCrea" name="btnCrea">
						Aggiungi
					</button>
				</div>
			</form>
		</div>
