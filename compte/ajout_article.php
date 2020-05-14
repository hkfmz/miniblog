<?php
session_start();

$bdd=new PDO('mysql:host=localhost;dbname=miniblog','root','');




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
   
 </style>
</head>
<body style="background-color: #ccc">    
     <div style="font-family: helvetica;">

      <header style="margin: 0 auto; background-color: #302c44; height: 100px; width: 1000px; text-align: center" >
              <h1 style="display: inline-block; color: white; font-family: none;">Mon Blog</h1><p style="background-color: #302c60; color: #ccc" ><marquee>Bienvenue sur mon blog, je publie regulièrement des articles sur la culture, l'art, la cuisine, le cinema et autres...</marquee></p><hr><hr><hr><hr><hr><hr>

              <br>
      </header>
<br>
      <ol style="display: flex; justify-content: center; font-style: none; text-decoration: none;">
           <li><a href="../index.php"><b>ACCUEIL</b></a></li>          
           <li><a href="deconnexion.php"><b>DECONNEXION</b></a></li>        
           <li><a href="ajout_article.php"><b>ARTICLE</b></a></li>              
                     
      </ol><br>

<br>
<main style="width: 999.1px; height: 300px; margin: 0 auto;">
<div style="zoom: 105%">
   <div style="display: flex;justify-content: center;">

    <form action="" method="post" enctype="multipart/form-data">
      <label for="titre">Titre de l'article:</label><br>
      <input type="name" name="titre" value="<?php if(isset($titre)) echo "$titre"; ?>" class="form form-control" ><br>
      <label for="image" >Image</label><br>
      <input type="file" name="photo"><br>
      <p>
        <label for="contenus">Contenu:</label><br>
        <textarea name="contenus" id="contenus" cols="100" rows="13" class="form form-control"></textarea>
      </p>
      <button type="submit" class="btn btn-success" style="zoom: 140%">Poster</button>
  
    </form>

  </div>
   </div>

</main>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr><hr><hr><hr><hr><hr><br>
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

<?php

 require_once('../config/connect.php');

    ///////////////////////////////////// RENSEIGNEMENT ETUDIANT isset($_POST['enregistrer'])
if($_SERVER["REQUEST_METHOD"] == "POST")
{
         
     $titre = htmlspecialchars($_POST['titre']);
     $contenus = htmlspecialchars($_POST['contenus']);

         if(!empty($_FILES))
     {

         $file_name=$_FILES['photo']['name'];
         $file_chemin=$_FILES['photo']['tmp_name'];
         $file_dest='../image/'.$file_name;
         $var=''.$file_name;
     }
 if(!empty($_POST['titre']) AND !empty($_POST['contenus']) AND !empty($_FILES))
         {

             $nomlength = strlen($titre);

     if($nomlength <= 255 )
     {
          
     $insertmbr1= $bdd->prepare('INSERT INTO articles (titre, images, contenus, date) VALUES (?,?,?,NOW())');

     $insertmbr1->execute(array($titre, $var, $contenus));

     move_uploaded_file($file_chemin,  $file_dest);

        echo "<script> alert('article enregistrer !'); </script>";

     }
     else
     {
     $erreur="Vous ne devez pas depasser 255 caractères!";
     echo "<script> alert('".$erreur."'); </script>";
     }

 }
  else
     {
     $erreur="Tous les champs doivent être remplis !";
     echo "<script> alert('".$erreur."'); </script>";
     }

}

?>