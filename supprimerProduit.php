<?PHP
include "../core/produitCore.php";
$produitC=new ProduitCore();
if (isset($_POST["supp"])){
	$produitC->SupprimerProduit($_POST["supp"],$_POST["with"]);
	header('Location: ../produits.html');
}

?>