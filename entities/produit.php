<?php
class Produit
{
	private $Reference;
	private $Nom;
	private $Prix;
	private $Description;
	private $Photo;
	private $Type;
	private $Solde;
	private $Remise;
	

	 function __construct($reference,$nom,$prix,$description,$photo,$type,$solde,$remise){
	 


	 	$this->Reference = $reference;
	 	$this->Nom = $nom;
	 	$this->Prix=$prix;
	 	$this->Description=$description;
	 	$this->Photo=$photo; 
	 	$this->Type=$type;
	 	$this->Solde=$solde;
	 	$this->Remise=$remise;

	 }

	 function getReference()
	 {
	 	return $this->Reference;
	 }

	 function getNom()
	 {
	 	return $this->Nom;
	 }

	 function getPrix()
	 {
	 	return $this->Prix;
	 }

	 function getDescription()
	 {
	 	return $this->Description;
	 }

	 function getPhoto()
	 {
	 	return $this->Photo;
	 }

	 function getType()
	 {
	 	return $this->Type;
	 }
	  function getSolde()
	 {
	 	return $this->Solde;
	 }
	  function getRemise()
	 {
	 	return $this->Remise;
	 }


	 function setReference($reference)
	 {
	 	$this->Reference = $reference;
	 }

	 function setNom($nom)
	 {
	 	$this->Nom = $nom;
	 }

	 function setPrix($prix)
	 {
	 	$this->Prix = $prix;
	 }

	 function setDescription($description)
	 {
	 	$this->Description = $description;
	 }

	 function setPhoto($photo)
	 {
	 	$this->Photo = $photo;
	 }

	 function setType($type)
	 {
	 	$this->Type = $type;
	 }
	 function setSolde($type)
	 {
	 	$this->Solde = $solde;
	 }
	 function setRemise($type)
	 {
	 	$this->Remise = $remise;
	 }
}

?>