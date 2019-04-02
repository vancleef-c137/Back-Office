<?PHP
include "../core/produitCore.php";
$produitC=new ProduitCore();
if(empty($_POST["ref"]) )
{
	echo "Vous devez donnez la reference du produit ";
}
elseif (empty($_POST["new"])) 
{
	echo "Vous devez donner la nouvelle valeure";
}
else
{
if (isset($_POST["ref"]) and isset($_POST["new"]) and ( $_POST["modwith"]=="Reference" or $_POST["modwith"]=="Prix" or $_POST["modwith"]=="Type" or $_POST["modwith"]=="Nom" or $_POST["modwith"]=="Photo")  ) {
	$produitC->ModifierProduit($_POST["ref"],$_POST["new"],$_POST["modwith"]);
	header('Location: ../produits.html');
}
else
{
	echo "Vous devez choisir modifier selon quel critere";
}
}
?>