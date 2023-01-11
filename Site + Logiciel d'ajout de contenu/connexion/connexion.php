<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Oui Oui Bageuette</title>
</head>
<body>
<style>
h1{
    margin-left: 40%;
}
fieldset{
	margin-left: 40%;
	margin-right: 50%;
}
</style>



<?php


session_start();

$mail=$_POST["mail"];
$mdp=$_POST['pass'];

 //crypte le mdp


		if($mail== 'username' && $mdp== 'mdp'){
			$_SESSION['user_id']=1;
			$_SESSION['mail']=$mail;
			$_SESSION['pass']=$mdp;
			header('location: ../admin.php');

		}
		

	
		else {
							//message d'erreur
			echo "<script> alert('erreur dans la saisie du mot de passe ou mail invalide');
			window.location.href='../Connexion/connexion.html';
			</script>";
		   }


	?>

	

</body>
</html>