<?php
include "../entities/produitensolde.php";
include "../entities/produit.php";
include "../core/produitensoldeCore.php";

if(isset($_POST['referencesolde']) and isset($_POST['remise']))
{
	$sql="SELECT * FROM produit WHERE reference=:ref";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $reference=$_POST['referencesolde'];
        
        
        $req->bindValue(':ref',$reference);

		
           $req->execute();
          $produit=$req->fetchAll();
          foreach ($produit as $row) {
           } 
           $prod = new Produit($row['reference'],$row['nom'],$row['prix'],$row['description'],$row['photo'],$row['type']);
           $prodsolde = new ProduitEnSolde($prod->getReference(),$prod->getNom(),$prod->getPrix(),$prod->getDescription(),$prod->getPhoto(),$prod->getType(),$_POST['remise']);
           $produitensolde1core=new ProduitensoldeCore();
$produitensolde1core->AjouterProduitensolde($prodsolde);
header('Location: ../produitsensolde.html');

           // $produit = new Produit();
           // $produit->setFetchMode(PDO::FETCH_ASSOC);
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        //$produitensolde= new ProduitEnSolde($reference,$produit->Nom,$produit->Prix,$produit->$Description,$produit->Photo,$produit->Type,$_POST['remise']);
        //echo $produitensolde->reference;
       // echo $result->getReference();
}
?>