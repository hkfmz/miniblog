<?php
session_start();

$bdd=new PDO('mysql:host=localhost;dbname=miniblog','root','');

require_once('../config/functions.php');

$articles=getArticles();


if(isset($_SESSION['id']) AND $_SESSION['id'] > 0)
{
  $getid= intval($_SESSION['id']);

  $requser=$bdd->prepare('SELECT * FROM membres WHERE id=?');

  $requser->execute(array($getid));

  $userinfos=$requser->fetch();
  
?>

<!DOCTYPE html>
<html>
<head>
  <title>Blog</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style type="text/css">
   #haut:hover{
    background-color: #302c44;
    color: white;
   }
 </style>
</head>
<body style="background-color: #ccc">    
     <div style="font-family: helvetica;">

      <header style="margin: 0 auto; background-color: #302c44; height: 100px; width: 1000px; text-align: center" >
              <h1 style="display: inline-block; color: white; font-family: none;">Mon Blog</h1><p style="background-color: #302c60; color: #ccc" ><marquee>Bienvenue sur mon blog, je publie regulièrement des articles sur la culture, l'art, la cuisine, le cinema et autres...</marquee></p>

              <br>
              <br>
              <br>
              <br>
      </header>
<br>
      <ol style="display: flex; justify-content: center; font-style: none; text-decoration: none;">
           <li><a href="../index.php"><b>ACCUEIL</b></a></li>          
           <li><a href="deconnexion.php"><b>DECONNEXION</b></a></li>        
           <li><a href="ajout_article.php"><b>ARTICLE</b></a></li>          
                     
      </ol><br>

<h2 style="text-align: center;" >Bienvenue administrateur</h2>
<br>
<p style="text-align: center; text-decoration: underline;" >Voici la liste des articles publier !</p>
<br>



<main style="width: 999.1px; height: 300px; margin: 0 auto;">

<?php foreach ($articles as $art): ?>
<ul>
      <li class="w3-padding-16" style="border: 1px solid #304c44;" id="haut">
        <img src="../image/<?= $art->images ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large"><?= $art->titre ?></span><br>
        <span><?= substr($art->contenus, 0, 77).'...'?></span>
      </li><button>Modifier</button><button><a href="<?php $art->id ?>#">Supprimer</a></button><!--php $supp=deleteArticle($art->id); $Supprime=deleteArticle($s);-->
</ul>
<?php endforeach ; ?>


</main>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>  

              <header style="margin: 0 auto; background-color: #302c44; height: 100px; width: 1000px; text-align: center" >
              <h5 style="display: inline-block; color: white;">footer</h5>
      </header>
     </div>


</body>
</html>

<?php

}else
{
  header("location: ../login.php");
}

?>