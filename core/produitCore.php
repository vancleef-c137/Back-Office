<?php
include "../config.php";

class ProduitCore 
{

	function AjouterProduit($produit)
	{
		$sql="insert into produit (reference,nom,prix,description,photo,type,solde,remise) values (null, :nom,:prix,:description,:photo, :type, :solde, :remise)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $nom=$produit->getNom();
        $prix=$produit->getPrix();
        $description=$produit->getDescription();
        $photo=$produit->getPhoto();
		$type=$produit->getType();
		$solde=$produit->getSolde();
		$remise=$produit->getRemise();
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':description',$description);
        $req->bindValue(':photo',$photo);
		$req->bindValue(':type',$type);
		$req->bindValue(':solde',$solde);
		$req->bindValue(':remise',$remise);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	}

	// function SupprimerProduit($nom){
	// 	$sql="DELETE FROM produit where upper(nom)= upper(:nom)";
	// 	$db = config::getConnexion();
 //        $req=$db->prepare($sql);
	// 	$req->bindValue(':nom',$nom);
	// 	try{
 //            $req->execute();
 //           // header('Location: index.php');
 //        }
 //        catch (Exception $e){
 //            die('Erreur: '.$e->getMessage());
 //        }
	// }


	function SupprimerProduit($input,$selon){
		if ( $selon=="Reference") {
			$sql="DELETE FROM produit where upper(reference)= upper(:input)";
		}
		elseif ($selon=="Nom") {
			$sql="DELETE FROM produit where upper(nom)= upper(:input)";
		}
		elseif ($selon=="Prix") {
			$sql="DELETE FROM produit where upper(prix)= upper(:input)";
		}
		elseif ($selon=="Type") {
			$sql="DELETE FROM produit where upper(type)= upper(:input)";
		}
		
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':input',$input);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierProduit($ref,$new,$modwhat){
		if ($modwhat=="Reference") {
			$sql="UPDATE produit SET reference=:input WHERE reference=:ref";
		}
		if ($modwhat=="Prix") {
			$sql="UPDATE produit SET prix=:input WHERE reference=:ref";
		}
		if ($modwhat=="Type") {
			$sql="UPDATE produit SET type=:input WHERE reference=:ref";
		}
		if ($modwhat=="Nom") {
			$sql="UPDATE produit SET nom=:input WHERE reference=:ref";
		}
		if ($modwhat=="Photo") {
			$sql="UPDATE produit SET photo=:input WHERE reference=:ref";
		}
		if ($modwhat=="Produit soldé"){
			$sql="UPDATE produit SET solde=:input WHERE reference=:ref";
		}

		
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':input',$new);
		$req->bindValue(':ref',$ref);

		try{
            $req->execute();
           
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }

        function GetAll()
        {

		$sql="select * from produit";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
         $req->execute();
         return $req->fetchAll();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        }
function search($sql)
        {
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
         $req->execute();
         return $req->fetchAll();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }






}
}



?>