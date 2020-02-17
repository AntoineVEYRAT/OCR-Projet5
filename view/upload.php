<?php ob_start(); ?>
<div class="content">
	<section>
		<div class="session">
			<h2>AJOUT D'UN AVATAR</h2>
			<br>
			<label>Avatar actuel</label>
				<?php 
					if(isset($_SESSION['img'])):
						?>
							<img src="./storage/img/<?= $_SESSION['img'] ?>" alt="<?= $_SESSION['img'] ?>" />
						<?php
					else:
				?>
						<img src="./storage/img/default.png" alt="default_avatar" />
				<?php
					endif;
				?>			
			<br>
			<form action="index.php?action=upload&verify" method="post" class="upload_form" enctype="multipart/form-data">
				<div class="session">
					<label for="upload">Ajout nouvel avatar</label>
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