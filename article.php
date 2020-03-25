 <?php
 
 if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
 {
 	header('Location: index.php');
 }
 else{
 	extract($_GET);

 	$id = strip_tags($id);
    
    require_once('config/functions.php');

    $article= getArticle($id);
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $article->titre ?></title>
	<meta charset="utf-8">
</head>
<body>
    <h1><?= $article->titre ?></h1>
    <time><?= $article->date ?></time>
    <br> <p><?= $article->contenus ?></p>
    <hr>

    <form action="article.php?id=<?= $article->id ?>" method="post">
    	<label for="auteur" >Pseudo:</label><br>
    	<input type="name" name="auteur"><br>

    	<p><label for="commentaire">Commentaire:</label><br>
    	<textarea name="commentaire" id="commentaire" cols="30" rows="8"></textarea></p>

    	<button type="submit">Poster</button>
    </form>

</body>
</html>