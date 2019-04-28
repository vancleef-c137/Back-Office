<?php
include "../config.php";

class ProduitensoldeCore 
{

	function AjouterProduitensolde($produitensolde)
	{
		$sql="insert into produitensolde (reference,nom,prix,description,photo,type,remise) values (:reference, :nom,:prix,:description,:photo, :type, :remise)";
		$sql_= "DELETE FROM produit WHERE reference=:ref ";
		$db = config::getConnexion();
		
		try{
		

        $req=$db->prepare($sql);
		
        $reference=$produitensolde->getReference();
        $nom=$produitensolde->getNom();
        $prix=$produitensolde->getPrix();
        $description=$produitensolde->getDescription();
        $photo=$produitensolde->getPhoto();
        $type=$produitensolde->getType();
        $remise=$produitensolde->getRemise();
        $req->bindValue(':reference',$reference);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':description',$description);
        $req->bindValue(':photo',$photo);
        $req->bindValue(':type',$type);
        $req->bindValue(':remise',$remise);

		
            $req->execute();

       
        
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        $req2=$db->prepare($sql_);
        $req2->bindValue(':ref',$reference);
        $req2->execute();
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


	function SupprimerProduitensolde($input,$selon){
		if ( $selon=="Reference") {
			$sql="DELETE FROM produitensolde where upper(reference)= upper(:input)";
		}
		elseif ($selon=="Nom") {
			$sql="DELETE FROM produitensolde where upper(nom)= upper(:input)";
		}
		elseif ($selon=="Prix") {
			$sql="DELETE FROM produitensolde where upper(prix)= upper(:input)";
		}
		elseif ($selon=="Type") {
			$sql="DELETE FROM produitensolde where upper(type)= upper(:input)";
		}
		elseif ($selon=="Remise") {
			$sql="DELETE FROM produitensolde where upper(remise)= upper(:input)";
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

	function modifierProduitensolde($ref,$new,$modwhat){
		if ($modwhat=="Reference") {
			$sql="UPDATE produitensolde SET reference=:input WHERE reference=:ref";
		}
		if ($modwhat=="Prix") {
			$sql="UPDATE produitensolde SET prix=:input WHERE reference=:ref";
		}
		if ($modwhat=="Type") {
			$sql="UPDATE produitensolde SET type=:input WHERE reference=:ref";
		}
		if ($modwhat=="Nom") {
			$sql="UPDATE produitensolde SET nom=:input WHERE reference=:ref";
		}
		if ($modwhat=="Photo") {
			$sql="UPDATE produitensolde SET photo=:input WHERE reference=:ref";
		}
		if ($modwhat=="Remise") {
			$sql="UPDATE produitensolde SET remise=:input WHERE reference=:ref";
		}

		
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':input',$new);
		$req->bindValue(':ref',$ref);

		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }












}



?>