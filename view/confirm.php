<?php ob_start(); ?>
<div class="content">
	<div class="confirm">
		<div class="confirm-zone">
			<h3>Confirmez votre choix</h3>
		</div>
		<div class="confirm-zone">
			<?php
				echo '<a href="index.php?action=ticket&delete&confirm&id=' . $idTicket . '" class="yes">OUI</a>';
			?>
		</div>
		<div class="confirm-zone">
			<a href="index.php?action=open&app" class="back">Retour</a>		
		</div>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	require('template.php'); 
?>