<?php
session_start();

$bdd=new PDO('mysql:host=localhost;dbname=miniblog','root','');

if(isset($_POST['formconnexion']))
{
      $mailconnet=htmlspecialchars($_POST['mailconnet']);
      $mdpconnect=sha1($_POST['mdpconnect']);
      $mdpconnect=sha1($mdpconnect);

      if(!empty($_POST['mailconnet']) AND !empty($_POST['mdpconnect']))
      {
           $requser=$bdd->prepare('SELECT * FROM membres WHERE mail = ? AND motdepasse = ?');
           $requser->execute(array($mailconnet, $mdpconnect));

           $userexist=$requser->rowCount();

           if($userexist == 1)
           {
              $userinfos=$requser->fetch();
              
              $_SESSION['id']=$userinfos['id'];
              $_SESSION['pseudo']=$userinfos['pseudo'];
              $_SESSION['mail']=$userinfos['mail'];

              header('location: compte/compte.php?id='.$userinfos['id']);
           }
           else{
             header("location: login.php");
           }
      }else
      {
        $erreur="Tous les champs doivent être renseigner !";
      } }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8"/>
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
           <li><a href="index.php"><b> ACCUEIL</b></a></li>        
           <li><a href=""><b>ABOUT</b></a></li>        
           <li><a href=""><b>COMPTE</b></a></li>      
      </ol><br>
<br>
<br>
<br>
<br>


<main style="width: 999.1px; height: 300px; margin: 0 auto;">

    <div style="display: flex; justify-content: center; zoom: 150%;">
         <div align="center">
    <h2>Connexion</h2>
     <br>
     <form method="POST" action="">

        <input type="email" name="mailconnet"  placeholder="Renseigner un mail">
        <input type="password" name="mdpconnect" placeholder="Mot de passe">
        <input type="submit" name="formconnexion" value="Se connecter">
               
     </form>
<br>
    <?php if(isset($erreur))
     
     {

      echo $erreur;
     }
     
     ?>

   </div>
    </div>

</main>



<hr><hr><hr><hr><hr><hr>

              <br><header style="margin: 0 auto; background-color: #302c44; height: 100px; width: 1000px; text-align: center" >
              <h5 style="display: inline-block; color: white;">footer</h5>
      </header>
     </div>


</body>
</html>