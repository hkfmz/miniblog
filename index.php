<?php
session_start();

require_once('config/functions.php');

$articles=getArticles();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

</head>
<body class="w3-light-grey">    

     <div class="w3-content" style="max-width:1400px">

      <header style="background-color: #302c44;" class="w3-container w3-center w3-padding-32">
              <h1 class="site-name"><span style="color: #fff"><b> Mon Blog</b></span></h1><p style="background-color: #302c60; color: #ccc" ><marquee>Bienvenue sur mon blog, je publie regulièrement des articles sur la culture, l'art, la cuisine, le cinema et autres...   -    Bienvenue sur mon blog, je publie regulièrement des articles sur la culture, l'art, la cuisine, le cinema et autres...   -  Bienvenue sur mon blog, je publie regulièrement des articles sur la culture, l'art, la cuisine, le cinema et autres...</marquee></p>
      </header>

      <div class="w3-row">

        
<br>
      <ol style="display: flex; justify-content: center; font-style: none; text-decoration: none;">
           <li><a href="#"><b> ACCUEIL</b></a></li>        
           <li><a href=""><b>ABOUT</b></a></li>        
           <li><a href="login.php"><b>COMPTE</b></a></li>        
      </ol><br>
<br>
<div class="w3-col l9 s12">

<?php foreach ($articles as $art): ?>
<main class="w3-card-4 w3-margin w3-white">



  
  <div style="width:50%; margin: 0 auto;" > 
    <img src="image/<?= $art->images ?>" alt="image" style="width:100%">
  </div>

  <div class="w3-container">
        <h2><?= $art->titre ?></h2>
        <time><?= $art->date ?></time>
   </div>
  <br>
<div class="w3-container">
  <p> 

  <?= substr($art->contenus, 0, 500).'...'?>
    
  </p>
 <div class="w3-row">
  <div class="w3-col m8 s12">

<a href="article.php?id=5" class=""><button class="w3-button w3-padding-large w3-white w3-border"><b>Lire l'article </b> </button></a>
</div>
</div>

</div>

</main><br>

<?php endforeach ; ?>

</div>

<div class="w3-col l3">
     <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top" >
<div style="width:60%; margin: 0 auto; background-repeat: repeat; background-image: url('image/avatar-big-01.jpg');">
      <img src="https://static8.viadeo-static.com/dv0_ZgWmdPs3Se_XVz_W9jdN8zI=/300x300/member/0021dyzfolgt0m0%3Fts%3D1581770961000" style="width:100%">
    </div>
  
    <div class="w3-container w3-white">
      <h4>Blog de<b> Hegel Motokoua</b></h4>
      <p>Juste moi, moi et moi, explorons l'univers de l'inconnu. J'ai un cœur d'amour et un intérêt pour le blog lorem ipsum et mauris neque quam. Je veux partager mon monde avec toi.</p>
    </div>
  </div><hr>

    <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Articles Populaire</h4>
    </div>

    <ul class="w3-ul w3-hoverable w3-white">

<?php foreach ($articles as $art): ?>

      <li class="w3-padding-16">
        <img src="image/<?= $art->images ?>" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large"><?= $art->titre ?></span><br>
        <span><?= substr($art->contenus, 0, 10).'...'?></span>
      </li>

<?php endforeach ; ?>

    </ul>
  </div>
  <hr> 

  <!-- Labels / tags -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags</h4>
    </div>
    <div class="w3-container w3-white">
    <p><span class="w3-tag w3-black w3-margin-bottom">Maroc</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Culture</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Magazine</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Voyage</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Blog</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Fruit</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Cuisine</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Manga</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
    </p>
    </div>
  </div>

</div>



</div>
              <br> <br>


<header style="margin: 0 auto; background-color: #302c44; height: 100px; width: 1000px; text-align: center"  >
              <h5 style="display: inline-block; color: white;">Mon premier blog PHP</h5>
      </header>
     </div>


</body>
</html>