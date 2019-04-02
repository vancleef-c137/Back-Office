<?PHP
include "../core/produitensoldeCore.php";
$produitensoldeC=new ProduitensoldeCore();
if (isset($_POST["supp"])){
	$produitensoldeC->SupprimerProduitensolde($_POST["supp"],$_POST["with"]);
	header('Location: ../produitsensolde.html');
}

?>