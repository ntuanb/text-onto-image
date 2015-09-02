<?php include_once('header.php'); ?>

<?php authCheck(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-3">

		</div>
		<div class="col-sm-6">

			<div class="page-header">
				<h1>Gift Creator</h1>
			</div>

			<form method="POST" action="test2.php">
				<div class="form-group">
					<label>Font</label>
					<select name="fontFile" class="form-control">
						<option value="MTCORSVA.ttf" selected>Monotype Corsiva</option>
						<option value="arial.ttf">Arial</option>
						<option value="Italianno-Regular-OTF.otf">Italianno</option>
					</select>
				</div>

				<div class="form-group">
					<label>Font Size</label>
					<select name="fontSize" class="form-control">
						<option value="20">20</option>
						<option value="19">17</option>
						<option value="18">18</option>
						<option value="17" selected>17</option>
						<option value="16">16</option>
						<option value="15">15</option>
						<option value="14">14</option>
						<option value="13">13</option>
						<option value="12">12</option>
					</select>
				</div>

				<div class="form-group">
					<label>To</label>
					<input type="text" name="to" class="form-control">
				</div>
				<div class="form-group">
					<label>From</label>
					<input type="text" name="from" class="form-control">
				</div>
				<div class="form-group">
					<label>Treatment</label>
					<input type="text" name="treatment" class="form-control">
				</div>
				<div class="form-group">
					<label>Message</label>
					<input type="text" name="message" class="form-control">
				</div>
				<div class="form-group">
					<label>Message 2</label>
					<input type="text" name="message2" class="form-control">
				</div>
				<div class="form-group">
					<label>Date</label>
					<select name="expiry" class="form-control">
						<option value="12">12 months</option>
						<option value="9">9 months</option>
						<option value="6" selected>6 months</option>
						<option value="3">3 months</option>
						<option value="1">1 month</option>
					</select>
				</div>
				<div class="form-group">
					<label>Code</label>
					<input type="text" name="code" class="form-control">
				</div>
				<input type="submit" value="submit" class="btn btn-success">
			</form>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>
