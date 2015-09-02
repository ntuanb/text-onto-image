<?php include_once('header.php'); ?>

<?php authCheck(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<div class="page-header">
				<h1>Results</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9">

			<?php
				doGiftcard($_POST['to'], $_POST['from'], $_POST['treatment'], $_POST['message'], $_POST['message2'], $_POST['expiry'], $_POST['code']);
			?>

		</div>
		<div class="col-sm-3">
			<h3>Most Recent</h3>
			<ul>
				<?php
					$files = getFiles();
					foreach($files as $file) {

						echo '<li><a href="gifts/' . $file . '">' . $file . '</a></li>';

					}
				?>
			</ul>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>
