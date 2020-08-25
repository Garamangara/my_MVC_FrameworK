<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>
	</head>
	<body>
		<header>
			<?= $header ?>
		</header>
		<div class="container">

			<!-- // сделать проверку: если путь к сайдбару лежит через папку left - выводить в блоке с классом left (или сделать проверку в представлении и называть переменную $sidebarLeft)
			<aside class="sidebar left">
				левый сайдбар
			</aside> -->
			<main>
				<?= $content ?>
			</main>
			<aside class="sidebar right">
				<?= $sidebar ?>
			</aside>
		</div>
		<footer>
			<?php echo $footer ?>
		</footer>
	</body>
</html>