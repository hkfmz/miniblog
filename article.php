<?php
session_start();

require('config/functions.php');  

$vide='Pas de commentaire sur cette article pour l\'instant !';

var_dump($_COOKIE['id'])
 	
 // extract($_GET);
  
 	//$id = strip_tags($id);
    
           if(!empty($_POST))
           {
           	extract($_POST);
           	$auteur=strip_tags($auteur);
           	$commentaire=strip_tags($commentaire);

           	$errors=array();

         if(empty($auteur)) array_push($errors, 'Veillez donner votre Pseudonyme !');

         if(empty($commentaire)) array_push($errors, 'Veillez ecrire un commentaire !');

           	if(count($errors) === 0)
           	{
           		$Commentaire= addCommentaire($id, $auteur, $commentaire);
           		$confirmation='Votre commentaire a été ajouté avec succès !';
                  
           		unset($auteur);
           		unset($commentaire);
           	}
           }



    $article= getArticle($id);

    $comment= getCommentaire($id);
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $article->titre ?></title>
	<meta charset="utf-8">
</head>
<body>
  
  <div >

  	<a href="index.php">Retour aux articles</a>
    
    <h1><?= $article->titre ?></h1>
    <time><?= $article->date ?></time>
    <br> <p><?= $article->contenus ?></p>
    <hr>


   <div class="row">
   	  <div class="col-md-6">

        
         <?php if(isset($confirmation)) 
                   echo $confirmation; 

               if(!empty($errors)):?>

                   <?php foreach($errors as $error): ?>

   	  	  <div ><?= $error; ?></div>
   	  	  	
   	  	                 <?php endforeach; ?>

                <?php endif ; ?>

   	  </div>
   </div>



<div class="row">
   <div class="col-md-6">

    <form action="article.php?id=<?= $article->id ?>" method="post">
    	<label for="auteur">Pseudo:</label><br>
    	<input type="name" name="auteur" value="<?php if(isset($auteur)) echo "$auteur"; ?>" class="form form-control"><br>

    	<p>
	    	<label for="commentaire">Commentaire:</label><br>
	    	<textarea name="commentaire" id="commentaire" cols="30" rows="5" class="form form-control"></textarea>
    	</p>

    	<button type="submit" class="btn btn-success">Poster</button>
	
    </form>

 	</div>
   </div>

     <br>
     <h2>Commentaires:</h2>
     
      
   <?php if(empty($comment)) : ?>
         <p> <?= $vide ?> </p>
    <?php endif ; ?>

   <?php foreach ($comment as $com) : ?>
        
        <h3> <?= $com->auteur ?> </h3>
        <time> <?= $com->date ?> </time>
        <p> <?= $com->commentaire ?> </p>
        <hr>

   <?php endforeach ; ?>

  </div>

</body>
</html>