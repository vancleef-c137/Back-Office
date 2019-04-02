<?php
include "../entities/produit.php";
include "../core/produitCore.php";

if ( isset($_POST['sucre']) ) {
	$type = 0;

}
elseif (isset($_POST['sale'])) {
	$type = 1;
	
}
elseif (isset($_POST['gateau'])) {
	$type = 2;
	
}
else
{
	$type = 3 ;
}

if (isset($_POST['reference']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['description']) and isset($_POST['photo']) ) 
{

$produit1=new Produit($_POST['reference'],$_POST['nom'],$_POST['prix'],$_POST['description'],$_POST['photo'],$type);

//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$produit1core=new ProduitCore();
$produit1core->AjouterProduit($produit1);
header('Location: ../produits.html');
	
}
else{
	echo "vérifier les champs";
}





//*/

?>