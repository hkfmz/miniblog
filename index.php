<?php
require_once('config/functions.php');

$articles=getArticles();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8"/>
</head>
<body>
   <h1 style="text-decoration: underline;">Tout les articles:</h1>
   <br>
   <?php foreach ($articles as $article): ?>
          <h2><?= $article->titre ?></h2>
          <time><?= $article->date ?></time><br>
          <a href="article.php?id=<?= $article->id ?>">Lire l'article...</a>
          <br>
   	<?php endForeach ; ?>
</body>
</html>