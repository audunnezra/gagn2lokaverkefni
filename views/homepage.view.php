<?php require 'partials/head.view.php'; ?>

	<h1>Homepage</h1>

	<?php foreach($movies as $movie): ?>
		<h1>
			<?= $movie->name; ?>
		</h1>
	<?php endforeach; ?>

<?php require 'partials/footer.view.php'; ?>