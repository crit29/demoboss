<div class="container-fluid home-container">
	<?php
	foreach($menu as $item) {
	?>
	<div class="home-item">
		<a href="<?= $item->url ?>">
			<button class="btn" style="background-color: <?= $item->color ?>"><?= $item->name ?></button>
		</a>
	</div>
	<?php
	}
	?>
</div>