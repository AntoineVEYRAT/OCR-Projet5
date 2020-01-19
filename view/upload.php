<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h3>AJOUT D'UN AVATAR</h3>
			<br>
			<label>Avatar actuel</label>
				<?php 
					if (isset($_SESSION['img'])) {
						echo '<img src="./storage/img/' . $_SESSION['img'] . '" alt="' . $_SESSION['img'] . '" width="100px" height="120px"/>';
					} else {
						echo '<img src="./storage/img/default.png" alt="default_avatar" />';
					}
				?>			
			<br>
			<form action="index.php?action=upload&verify" method="post" class="upload_form" enctype="multipart/form-data">
				<div class="session">
					<input type="file" name="avatar" id="upload" required>

				</div>
				<div class="session">
					<label class="button-form">Changer<input type="submit" value="Upload" class="input-form"></label>
				</div>
			</form>
			<br>
			<a href="index.php?action=open&app">Retour</a>
		</div>
	</section>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>