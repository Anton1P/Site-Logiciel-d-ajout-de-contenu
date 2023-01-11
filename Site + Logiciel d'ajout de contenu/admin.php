
<?php 

session_start();

if(!isset($_SESSION["user_id"])) {
header("Location: index.html");
    exit;
}




try {
  $bdd = new PDO( "mysql:host=localhost;dbname=bdd-name" , 'root' , '') ;
} 
catch ( Exception $e )
{
 die ( 'Erreur : ' . $e->getMessage ( ) ) ;
}


?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen -  Login Form | Nothing4us </title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="asset/style/style4.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  
</div>
<div class="rerun"><a href="">Retour à l'accueil</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Ajouter</h1>



    <form action="upload.php" method="post" enctype="multipart/form-data" id="form_upload">
      <div class="input-container">

      <label style="color:black;" for="type_crea">Choisie le type de création :</label><br><br><br><br>
      <select required name="type_crea" id="type_crea">
                        <option value="">--Choisie ICI--</option>
                        <option value="Tatouage">Tatouage</option>
                        <option value="Tableau">Tableau</option>
                        <option value="Dessin">Dessin</option>
                        <option value="Print">Print</option>
                        <option value="Sculture">Sculture</option>
                    </select>
        
                    <br><br>
      <div class="input-container">
      <label style="color:black;" for="#{label}">Titre de la création :</label><br><br>
      <input type="#{type}" id="#{label}" name="titre" required="required"minlength="1" maxlength="25" />
        <div class="bar"></div>
      </div>

      <div class="input-container">

      <label style="color:black;margin-left:-65px;" for="textarea">Explication de la création :</label><br>
      </div>
      <div class="footer"><a href="#"></a>
      <textarea id="textarea" required name="textarea"rows="5" cols="30"placeholder="Voici ou tu place le texte."></textarea><br><br>
      
      <div class="input-container">
      <p style="color:black;" for="nomFichier">Indiquez un fichier image (png ou jpeg) à téléverser : </p>
    </div>

    <input type="file" name="nomFichier" id="nomFichier" form="form_upload" required accept="image/jpeg image/png" >
        
      <div class="button-container">
        <button type="submit"  form="form_upload" ><span>Ajouter</span></button>
      </div>
    </div>
    </form>
  </div>


  
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Supprimer
      <div class="close"></div>
    </h1>
    <form  action="suppr.php" method="post" enctype="multipart/form-data" id="form_suppr">
      <div class="input-container">
      <br>
        <label for="suppr_crea">Choisie l'element à supprimer :</label><br><br><br>


        <?php


$data=$bdd -> prepare("SELECT `Titres` FROM `tatouage` ");
$data -> execute();
$vaccinations = $data -> fetchAll();

$Titres_tatouage=array(); //Mon Tableau Titres en entier 

foreach ($vaccinations as $vaccination ) {
  $Titres_tatouage[]=$vaccination['Titres'];
}

echo '<select name="suppr_crea_tatouage" id="suppr_crea_tatouage">';
echo '<option value="">Tout les Tatouages</option>';
foreach ($Titres_tatouage as $Titres_tatouage) {
  echo '<option value="'.$Titres_tatouage.'">'.$Titres_tatouage.'</option>';
}

echo '</select>';
?>
<br><br><br><br><br><br>
<?php


$data=$bdd -> prepare("SELECT `Titres` FROM `dessin` ");
$data -> execute();
$vaccinations = $data -> fetchAll();

$Titres_dessin=array(); //Mon Tableau Titres en entier 

foreach ($vaccinations as $vaccination ) {
  $Titres_dessin[]=$vaccination['Titres'];
}





echo '<select name="suppr_crea_dessin" id="suppr_crea_dessin">';
echo '<option value="">Tout les Dessins</option>';
    $i=1;
foreach ($Titres_dessin as $Titres_dessin) {
    $i++;
  echo '<option value="'.$Titres_dessin.'">'.$Titres_dessin.'</option>';
}

echo '</select>';
?>
<br><br><br><br><br><br>
<?php


$data=$bdd -> prepare("SELECT `Titres` FROM `tableau` ");
$data -> execute();
$vaccinations = $data -> fetchAll();

$Titres_tableau=array(); //Mon Tableau Titres en entier 

foreach ($vaccinations as $vaccination ) {
  $Titres_tableau[]=$vaccination['Titres'];
}





echo '<select name="suppr_crea_tableau" id="suppr_crea_tableau">';
echo '<option value="">Tout les Tableaux</option>';
    $i=1;
foreach ($Titres_tableau as $Titres_tableau) {
    $i++;
  echo '<option value="'.$Titres_tableau.'">'.$Titres_tableau.'</option>';
}

echo '</select>';
?>
<br><br><br><br><br><br>
<?php


$data=$bdd -> prepare("SELECT `Titres` FROM `print` ");
$data -> execute();
$vaccinations = $data -> fetchAll();

$Titres_print=array(); //Mon Tableau Titres en entier 

foreach ($vaccinations as $vaccination ) {
  $Titres_print[]=$vaccination['Titres'];
}





echo '<select name="suppr_crea_print" id="suppr_crea_print">';
echo '<option value="">Tout les Prints</option>';
    $i=1;
foreach ($Titres_print as $Titres_print) {
    $i++;
  echo '<option value="'.$Titres_print.'">'.$Titres_print.'</option>';
}

echo '</select>';
?>
<br><br><br><br><br><br>
<?php


$data=$bdd -> prepare("SELECT `Titres` FROM `sculture` ");
$data -> execute();
$vaccinations = $data -> fetchAll();

$Titres_sculture=array(); //Mon Tableau Titres en entier 

foreach ($vaccinations as $vaccination ) {
  $Titres_sculture[]=$vaccination['Titres'];
}





echo '<select name="suppr_crea_sculture" id="suppr_crea_sculture">';
echo '<option value="">Toutes les Scultures</option>';
    $i=1;
foreach ($Titres_sculture as $Titres_sculture) {
    $i++;
  echo '<option value="'.$Titres_sculture.'">'.$Titres_sculture.'</option>';
}

echo '</select>';
?>
   
      </div>
    
      <div class="button-container">
        <button type="submit"  form="form_suppr" ><span>Supprimer</span></button>
      </div>
    </form>
  </div>
</div>


<!-- partial -->
<script src='https://code.jquery.com/jquery-3.5.1.js'></script><script  src="asset/js/script4.js"></script>

</body>
</html>
<!-- partial -->


</body>
</html>
