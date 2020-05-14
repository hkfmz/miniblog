<?php

 function getArticles()
 {
    require ('connect.php');

    $req= $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');

	 	$req->execute();

	 	$data = $req->fetchAll(PDO::FETCH_OBJ);//->setFetchMode(PDO::FETCH_OBJ)

	 	return $data;

	 	$req->closeCursor();
 }

   function deleteArticle($id)
{
    require ('connect.php');

    $req= $bdd->prepare('DELETE * FROM articles WHERE id=?');

    $req->execute( array($id) );

    $req->closeCursor();
 }


function getArticle($id)
{
	require('connect.php');

    $req=$bdd->prepare('SELECT id, titre, image, contenus,date FROM articles WHERE id= ?');
    $req->execute(array($id));

    if($req->rowCount()== 1)
    {
    	$data=$req->fetch(PDO::FETCH_OBJ);
    	return $data;
    }
    else
    {
    	header('Location: index.php');
    }

     $req->closeCursor();
}


function addCommentaire($articleId, $auteur, $commentaire)
{
  require ('connect.php');

  //ne concerne que la database 
  $req=$bdd->prepare('INSERT INTO commentaires (articleId, auteur, commentaire, date) VALUES (?, ?, ?, NOW())');

  //ici c'est par rapport à php afin de remplire des valeurs à la place des "?" dans la réquète. 
  $req->execute(array($articleId, $auteur, $commentaire));

  $req->closeCursor();
}

          function getCommentaire($id)
          {
            require ('connect.php');
            
            $req= $bdd->prepare('SELECT * FROM commentaires WHERE articleId=?');
            $req->execute(array($id));

            $data= $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor();
          }

?>