<?php 

session_start(); 

if(!isset($_SESSION["user_id"])) {
    header("Location: index.html");
        exit;
    }



try {
    $bdd = new PDO( "mysql:host=localhost;dbname=projet1" , 'root' , '') ;
  } 
  catch ( Exception $e )
  {
   die ( 'Erreur : ' . $e->getMessage ( ) ) ;
  }


  //Suppr 

  $suppr_dessin=$_POST["suppr_crea_dessin"];
  $suppr_tableau=$_POST["suppr_crea_tableau"];
  $suppr_tatouage=$_POST["suppr_crea_tatouage"];
  $suppr_print=$_POST["suppr_crea_print"];
  $suppr_sculture=$_POST["suppr_crea_sculture"];




//supprimer


if (isset($suppr_dessin) ) {

// prend la photo de la bdd et la met dans la variable images 

    $data=$bdd -> prepare("SELECT `Images` FROM `dessin` WHERE  Titres=:Titres ");
    $data->execute(array(':Titres' =>$suppr_dessin));
    $result = $data->rowCount();
    if ($result > 0) {
        $vaccinations = $data->fetchAll();
        $image=array(); //Mon Tableau Titres en entier 
    
       foreach ($vaccinations as $vaccination ) {
          $image[]=$vaccination['Images'];
          }


          $image=implode("", $image);
            //suprime l'image du dossier


              if (file_exists($image)) {
                      unlink($image);
                      echo "<br>Image has been deleted successfully.";
                      header("Location: creation/dessin.php");

                 } else {
                    echo "<br>Error: Image not found for Dessin.";
                 }
          }else{
         echo "";
            }   
    
//suprime tout de la bdd

    $sqlDeleteQuery = "DELETE FROM dessin WHERE Titres=:Titres" ;
    $supprimerdessin = $bdd->prepare ( $sqlDeleteQuery ) ;
    $supprimerdessin->execute ( array (
    'Titres' => $suppr_dessin)) ;
    

} 

if (isset($suppr_tatouage) ) {


// prend la photo de la bdd et la met dans la variable images 

$data=$bdd -> prepare("SELECT `Images` FROM `tatouage` WHERE  Titres=:Titres ");
$data->execute(array(':Titres' =>$suppr_tatouage));
$result = $data->rowCount();
if ($result > 0) {
    $vaccinations = $data->fetchAll();
    $image=array(); //Mon Tableau Titres en entier 

   foreach ($vaccinations as $vaccination ) {
      $image[]=$vaccination['Images'];
      }


      $image=implode("", $image);
        //suprime l'image du dossier
      echo"$image";

          if (file_exists($image)) {
                  unlink($image);
                  echo "<br>Image has been deleted successfully.";
                  header("Location: creation/tatouage.php");
             } else {
                echo "<br>Error: Image not found for tatouage.";
             }
      }else{
     echo "";
        }   





//suprime tout de la bdd
    $sqlDeleteQuery = "DELETE FROM tatouage WHERE Titres=:Titres" ;
    $supprimertatouage = $bdd->prepare ( $sqlDeleteQuery ) ;
    $supprimertatouage->execute ( array (
    'Titres' => $suppr_tatouage)) ;

} 

if (isset($suppr_tableau) ) {

// prend la photo de la bdd et la met dans la variable images 

$data=$bdd -> prepare("SELECT `Images` FROM `tableau` WHERE  Titres=:Titres ");
$data->execute(array(':Titres' =>$suppr_tableau));
$result = $data->rowCount();
if ($result > 0) {
    $vaccinations = $data->fetchAll();
    $image=array(); //Mon Tableau Titres en entier 

   foreach ($vaccinations as $vaccination ) {
      $image[]=$vaccination['Images'];
      }


      $image=implode("", $image);
        //suprime l'image du dossier


          if (file_exists($image)) {
                  unlink($image);
                  echo "<br>Image has been deleted successfully.";
                  header("Location: creation/tableau.php");
             } else {
                echo "<br>Error: Image not found for tableau.";
             }
      }else{
     echo "";
        }   


//suprime tout de la bdd
    $sqlDeleteQuery = "DELETE FROM tableau WHERE Titres=:Titres" ;
    $supprimertableau = $bdd->prepare ( $sqlDeleteQuery ) ;
    $supprimertableau->execute ( array (
    'Titres' => $suppr_tableau)) ;

} 

if (isset($suppr_print) ) {

// prend la photo de la bdd et la met dans la variable images 

$data=$bdd -> prepare("SELECT `Images` FROM `print` WHERE  Titres=:Titres ");
$data->execute(array(':Titres' =>$suppr_print));
$result = $data->rowCount();
if ($result > 0) {
    $vaccinations = $data->fetchAll();
    $image=array(); //Mon Tableau Titres en entier 

   foreach ($vaccinations as $vaccination ) {
      $image[]=$vaccination['Images'];
      }


      $image=implode("", $image);
        //suprime l'image du dossier


          if (file_exists($image)) {
                  unlink($image);
                  echo "Image has been deleted successfully.";
                  header("Location: creation/print.php");
             } else {
                echo "Error: Image not found for print.";
             }
      }else{
     echo "";
        }   

  

//suprime tout de la bdd
    $sqlDeleteQuery = "DELETE FROM print WHERE Titres=:Titres" ;
    $supprimerprint = $bdd->prepare ( $sqlDeleteQuery ) ;
    $supprimerprint->execute ( array (
    'Titres' => $suppr_print)) ;

} 

if (isset($suppr_sculture) ) {

// prend la photo de la bdd et la met dans la variable images 

$data=$bdd -> prepare("SELECT `Images` FROM `sculture` WHERE  Titres=:Titres ");
$data->execute(array(':Titres' =>$suppr_sculture));
$result = $data->rowCount();
    if ($result > 0) {
    $vaccinations = $data->fetchAll();
    $image=array(); //Mon Tableau Titres en entier 

        foreach ($vaccinations as $vaccination ) {
           $image[]=$vaccination['Images'];
        }


      $image=implode("", $image);
        //suprime l'image du dossier


          if (file_exists($image)) {
                  unlink($image);
                  echo "Image has been deleted successfully.";
                  header("Location: creation/sculture.php");
             } else {
                echo "Error: Image not found for sculture.";
             }
      }else{
     echo "";
    }   
    
//suprime tout de la bdd
    $sqlDeleteQuery = "DELETE FROM sculture WHERE Titres=:Titres" ;
    $supprimersculture = $bdd->prepare ( $sqlDeleteQuery ) ;
    $supprimersculture->execute ( array (
    'Titres' => $suppr_sculture)) ;


} 












?>