<?php

$bdd=new PDO('mysql:host=localhost;dbname=espace_membre','root','');


if(isset($_POST['forminscription']))
{
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $mail = htmlspecialchars($_POST['mail']);
      $mail2 = htmlspecialchars($_POST['mail2']);

      $mdp = sha1($_POST['mdp']);
      $mdp2 = sha1($_POST['mdp2']);

      $mdp = sha1($mdp);
      $mdp2 = sha1($mdp2);

     if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
     {

      $pseudolength = strlen($pseudo);

      $maillength=strlen($mail);
      $mail2length=strlen($mail2);
        
if($pseudolength <= 255 )
{
      $sav=preg_match("#^[A-Za-z '-]+$#",$pseudo);
 if($sav)
 {

  if($maillength <= 255 || $mail2length <= 255)
  {
      if ($mail == $mail2)
      {
         if(filter_var($mail, FILTER_VALIDATE_EMAIL))
         {

          $reqmail = $bdd->prepare('SELECT * FROM membres WHERE mail= ?');
          $reqmail->execute(array($mail));

          $mailexiste=$reqmail->rowCount();

          if($mailexiste == 0)
          {

           if ($mdp == $mdp2)
              {
                    $insertmbr= $bdd->prepare('INSERT INTO membres (pseudo, mail, motdepasse) VALUES (?,?,?)');

                   $insertmbr->execute(array($pseudo,$mail,$mdp));

                   $erreur="Nouveau membre inscrit avec success !";
              }
              else
              {
                 $erreur="Vos mots de passe ne correspondent pas !";
              }
           }
           else
           {
              $erreur="Email déjà utilisé !";
           }

          }else{
            $erreur="Email non valide !";
          }
      }
      else
      {
         $erreur="Vos adresses mail ne correspondent pas !";
      }
  }
  else{
    $erreur="Vous ne devez pas depasser 255 caractères !";
  }
          }else
          {
           $erreur="Vous ne devez pas utilisé des chiffres ou caractères indésirable comme pseudo !";
          }
 
}
else
{
$erreur="Vous ne devez pas depasser 255 caractères!";
}


}
else
{
$erreur="Tous les champs doivent être remplis !";
}
}

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
           <li><a href="login.php"><b>COMPTE</b></a></li>        
           <li><a href="inscription.php"><b>NOUVEAU COMPTE</b></a></li>        
      </ol><br>

<main style="width: 999.1px; height: 300px; margin: 0 auto;">

       <div align="center" style="zoom: 150%;">
    <h2>Inscription</h2>

 <form method="POST" action="">

       <table>
       <!--Nom-->
        <tr>
          <td align="right">
            <label for="pseudo">Pseudo:</label>
          </td>

          <td>
            <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" style="width: 210px;" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
          </td>
        </tr>
           <!--Mail-->
        <tr>
          <td align="right">
            <label for="mail">Mail:</label>
          </td>

          <td>
            <input type="email" id="mail" name="mail" placeholder="Votre mail" style="width: 210px;" value="<?php if(isset($mail)) { echo $mail; } ?>">
          </td>
        </tr>

        <!--Mail2-->
        <tr>
          <td align="right">
            <label for="mail2">Confirmation du mail:</label>
          </td>

          <td>
            <input type="email" id="mail2" name="mail2" placeholder="Réecrire votre mail" style="width: 210px;" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
          </td>
        </tr>

        <!--Mot de passe-->
        <tr>
          <td align="right">
            <label for="mdp">Mot de passe:</label>
          </td>

          <td>
            <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" style="width: 210px;">
          </td>
        </tr>

        <!--Mot de passe 2-->
        <tr>
          <td align="right">
            <label for="mdp">Confirmation mot de passe:</label>
          </td>

          <td>
            <input type="password" id="mdp2" name="mdp2" placeholder="Confirmer votre mot de passe" style="width: 210px;">
          </td>
        </tr>
               
               <tr><td></td><td><input type="submit" value="S'inscrire" name="forminscription"></td></tr>

       </table>    
               
     </form>

    <?php if(isset($erreur))
     
     {

      echo $erreur;
     }
     
     ?>

   </div>

</main>


<hr><hr><hr><hr><hr><hr>

              <br><header style="margin: 0 auto; background-color: #302c44; height: 100px; width: 1000px; text-align: center" >
              <h5 style="display: inline-block; color: white;">footer</h5>
      </header>
     </div>


</body>
</html>