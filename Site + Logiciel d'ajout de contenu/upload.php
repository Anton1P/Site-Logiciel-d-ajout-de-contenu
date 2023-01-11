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

  //ajout 
  
  $textarea=$_POST["textarea"];
  $titre=$_POST["titre"];
  
echo"<pre>";
print_r($_FILES);
echo"</pre>";


$type_crea=$_POST['type_crea'];
$type=$_FILES['nomFichier']['type'];
$nom_tmp=$_FILES['nomFichier']['tmp_name'];
$size=$_FILES['nomFichier']['size'];
define ('SITE_ROOT', realpath(dirname(__FILE__)));

switch ($type){
    case 'image/jpeg';
        $nom_upload="image".time().".jpeg";
        break;
    case 'image/png';
        $nom_upload="image".time().".png";
        break;
    case 'image/gif';
        $nom_upload="image".time().".gif";
        break;
    default:
        $nom_upload="";
        break;
}

if($nom_upload!=""){
 
    if($size<5097152){
//  Tatouage    
        if($type_crea == 'Tatouage') {

            if(move_uploaded_file($nom_tmp, SITE_ROOT."/asset/img/tatouage/".$nom_upload)) {

                $image="asset/img/tatouage/".$nom_upload;

                $sqlInsertQuery = "INSERT INTO tatouage( Titres, Descriptions, Images  ) VALUES ( :Titres , :Descriptions , :Images  )" ; 
                $NewUser = $bdd->prepare ( $sqlInsertQuery ) ;
                $NewUser ->execute ( array (
                'Titres' => $titre ,
                'Descriptions' => $textarea,
                'Images' => $image 
                 ));

                header('Location: creation/tatouage.php');
            }
            else {
                echo"<h1>une erreur est survenue lors du téléversement</h1>";
             }
        }     
//  Tableau                               
        elseif($type_crea == 'Tableau'){
            
            if(move_uploaded_file($nom_tmp, SITE_ROOT."/asset/img/tableau/".$nom_upload)) {

                $image="asset/img/tableau/".$nom_upload;

                $sqlInsertQuery = "INSERT INTO tableau( Titres, Descriptions, Images  ) VALUES ( :Titres , :Descriptions , :Images  )" ; 
                $NewUser = $bdd->prepare ( $sqlInsertQuery ) ;
                $NewUser ->execute ( array (
                'Titres' => $titre ,
                'Descriptions' => $textarea,
                'Images' => $image 
                 ));


                header('Location: creation/tableau.php');
            }
            else {
                echo"<h1>une erreur est survenue lors du téléversement</h1>";
             }

        }
//  Dessin 
        elseif($type_crea == 'Dessin'){

            if(move_uploaded_file($nom_tmp, SITE_ROOT."/asset/img/dessin/".$nom_upload)) {

                $image="asset/img/dessin/".$nom_upload;

                $sqlInsertQuery = "INSERT INTO dessin( Titres, Descriptions, Images  ) VALUES ( :Titres , :Descriptions , :Images  )" ; 
                $NewUser = $bdd->prepare ( $sqlInsertQuery ) ;
                $NewUser ->execute ( array (
                'Titres' => $titre ,
                'Descriptions' => $textarea,
                'Images' => $image 
                 ));
                header('Location: creation/dessin.php');
             }
            else {
                echo"<h1>une erreur est survenue lors du téléversement</h1>";
              }

    }
//  Print 
         elseif($type_crea == 'Print'){

            if(move_uploaded_file($nom_tmp, SITE_ROOT."/asset/img/print/".$nom_upload)) {
                
                $image="asset/img/print/".$nom_upload;

                $sqlInsertQuery = "INSERT INTO print( Titres, Descriptions, Images  ) VALUES ( :Titres , :Descriptions , :Images  )" ; 
                $NewUser = $bdd->prepare ( $sqlInsertQuery ) ;
                $NewUser ->execute ( array (
                'Titres' => $titre ,
                'Descriptions' => $textarea,
                'Images' => $image 
                 ));
            header('Location: creation/print.php');
          }
            else {
            echo"<h1>une erreur est survenue lors du téléversement</h1>";
           }


    }
//  Sculture 
        else{
            if(move_uploaded_file($nom_tmp, SITE_ROOT."/asset/img/sculture/".$nom_upload)) {
                  
                $image="asset/img/sculture/".$nom_upload;

                $sqlInsertQuery = "INSERT INTO sculture( Titres, Descriptions, Images  ) VALUES ( :Titres , :Descriptions , :Images  )" ; 
                $NewUser = $bdd->prepare ( $sqlInsertQuery ) ;
                $NewUser ->execute ( array (
                'Titres' => $titre ,
                'Descriptions' => $textarea,
                'Images' => $image 
                 ));
            header('Location: creation/sculture.php');
         }
            else {
            echo"<h1>une erreur est survenue lors du téléversement</h1>";
         }

    }

}
    else{
        echo"<h1>erreur, le fichier est trop lourd !</h1>";}   
}
else{
    echo"<h1>Le type du fichier n'est pas valide </h1>";
}




?>