<?php 

session_start(); 


try {
  $bdd = new PDO( "mysql:host=localhost;dbname=projet1" , 'root' , '') ;
} 
catch ( Exception $e )
{
 die ( 'Erreur : ' . $e->getMessage ( ) ) ;
}


?>
<!doctype html>
<html><html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Dessin | L'ange</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'>
<link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/solid.css'><link rel="stylesheet" href="../asset/style/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" >
<link rel="stylesheet" href="../asset/style/styleport.css" >
<script src="https://code.jquery.com/jquery-3.6.1.min.js"integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script>
    </head>

    <body>


        




<!-- partial:index.partial.html -->
<!-- #Cursor -->
<div class="cursor"></div>
<div id="cursor">
  <div class="cursor-circle"></div>
</div>

<!-- Menu Images -->
<!-- Image 1 -->
<div id='m-img-1' class='menu-image-wrapper'>
  <img class='menu-image' src='../asset/img/img1.jpg' alt=''>
  <img class='menu-image-back' src='../asset/img/img1.jpg' alt=''>
</div>
<!-- Image 2 -->
<div id="m-img-2" class="menu-image-wrapper">
  <img class="menu-image" src="../asset/img/img2.PNG" alt="">
  <img class="menu-image-back" src="../asset/img/img2.PNG" alt="">
</div>
<!-- Image 3 -->
<div id="m-img-3" class="menu-image-wrapper">
  <img class="menu-image" src="../asset/img/print.PNG" alt="">
  <img class="menu-image-back" src="../asset/img/print.PNG" alt="">
</div>
<!-- Image 4 -->
<div id="m-img-4" class="menu-image-wrapper">
  <img class="menu-image" src="../asset/img/tablo.PNG" alt="">
  <img class="menu-image-back" src="../asset/img/tablo.PNG" alt="">
</div>
<!-- Image 5 -->
<div id="m-img-5" class="menu-image-wrapper">
  <img class="menu-image" src="../asset/img/sculture.PNG" alt="">
  <img class="menu-image-back" src="../asset/img/sculture.PNG" alt="">
</div>




<nav id="navbar" class="flexbox">
  <div class="navbar-inner">
    <div class="navbar-left flexbox-left">
      <div id="nav-button" cursor-class="arrow">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="navbar-center">
            
    </div>
    <div class="navbar-right flexbox-right">
      <a  cursor-class="arrow" style=" text-decoration:none;" href="../index.html"><p class="effet2" >L'Ange</p></a>
    </div>
  </div>
</nav>



<!-- #Menu -->
<div class="menu-wrapper flexbox" >

  <!-- Menu Right -->
  <ul class="menu flexbox-col-left-start" >
    <li id="m-item-w-1" class="menu-item flexbox ">
    <a href="tatouage.php"><h1 id="m-item-1" class="menu-item-inner"style="font-size: 4em;" cursor-class="arrow">Tatouage</h1></a>
    </li>
    <li id="m-item-w-2" class="menu-item flexbox">
    <a href="dessin.php"><h1 id="m-item-2" class="menu-item-inner" style="font-size: 4em;"cursor-class="arrow">Dessin</h1></a>
    </li>
    <li id="m-item-w-3" class="menu-item flexbox">
    <a href="print.php"><h1 id="m-item-3" class="menu-item-inner" style="font-size: 4em;"cursor-class="arrow">Print</h1></a>
    </li>
    <li id="m-item-w-4" class="menu-item flexbox">
    <a href="tableau.php"><h1 id="m-item-4" class="menu-item-inner"style="font-size: 4em;" cursor-class="arrow">Tableau</h1></a>
    </li>
    <li id="m-item-w-5" class="menu-item flexbox">
    <a href="sculture.php"><h1 id="m-item-5" class="menu-item-inner" style="font-size: 4em;"cursor-class="arrow">Sculture</h1></a>
    </li>
  </ul>


</div>










<!-- #Header -->

<!-- #Main -->
<main class="flexbox-col2">

  <header class="header-res"><h1>
    Dessin <br> <span class="header-res2">[ Travaux Effectés ]</span></h1>
</header>

<div id="top"></div>
<section class="gallery">
	<div class="row">
    <ul class="">
      <a  cursor-class="arrow" href="#" class="close"></a>
     
      <?php 

$data=$bdd -> prepare("SELECT id_dessin FROM `dessin`");
$data -> execute();
$vaccinatios = $data -> fetchAll();

$id_tatouagemax=array();

foreach ($vaccinatios as $vaccinatio ) {
  $id_tatouagemax[]=$vaccinatio['id_dessin'];

}


$i=-2;

if ($dossier = opendir("../asset/img/dessin")){
    while(($fichier = readdir($dossier)) ==! false){
       if($fichier != "." & $fichier != "..")
        echo "   <li class='effet space_block'>
        <a  cursor-class='arrow' class='image' href='#$i'>
          <img  src='../asset/img/dessin/$fichier ' alt=''>
        </a>
      </li>"  ;
      $i++;
     
    }
}

?>



    </ul>
</div>

<!-- 
SOLUTION ICI -->




     <?php 

$data=$bdd -> prepare("SELECT `id_dessin`, `Titres`, `Descriptions`, `Images` FROM `dessin` ");
$data -> execute();
$vaccinations = $data -> fetchAll();

$id_tatouage=array(); //Mon id_tatouage Image en entier 
$Titres=array(); //Mon Tableau Titres en entier 
$Descriptions=array(); //Mon Descriptions Image en entier 
$Images=array(); //Mon Tableau Image en entier 

foreach ($vaccinations as $vaccination ) {
  $id_tatouage[]=$vaccination['id_dessin'];
  $Titres[]=$vaccination['Titres'];
  $Descriptions[]=$vaccination['Descriptions'];
  $Images[]=$vaccination['Images'];
}



// je veux placer chaque element du tablo a sont numero d id respectif dans le h et le p avec le javascript 


$i2=count($id_tatouagemax)+1;
if ($dossier = opendir("../asset/img/dessin")){
    while(($fichier = readdir($dossier)) ==! false){
       if($fichier != "." & $fichier != "..")
        echo " 
        <div id='$i2' class='port'>
	
		    <div class='row'>
		    	<div class='description'>
			    	<h1 style='font-family: Bodoni Moda, serif; font-weight:800;'></h1>  
			    	<p style='margin-top:30px;font-weight:500; font-size:21px;'></p>
		    	</div> <div class=' descriptionimg' >
                <img style=' width: 500px;height: auto;' src='../asset/img/dessin/$fichier ' alt=''>
                </div></div>
            </div> ";
            $i2--;
                
    }
}



?>



<script>

var Titres = <?php echo json_encode($Titres); ?>;
var idmax = <?php echo json_encode($id_tatouagemax); ?>;

$(document).ready(function() {
    var j = idmax.length;
    var k = -1;
    for (var i = 0; i < Titres.length; i++) {
        console.log( "#"+ j);
        j--;
        k++;
        $( "#"+ j ).find( "h1" ).text(Titres[k]);
    }
});



var Descriptions = <?php echo json_encode($Descriptions); ?>;
$(document).ready(function() {
    var j = idmax.length;;
    var k = -1;
    for (var i = 0; i < Descriptions.length; i++) {
         console.log( "#"+ j);
        j--;
        k++;
        $( "#"+ j ).find( "p" ).text(Descriptions[k]);
    }
});

</script>








</section> <!-- / projects -->
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="../asset/js/scriptport.js"></script>

  
</main> 
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script><script  src="../asset/js/script.js"></script>

</body>
</html>

    