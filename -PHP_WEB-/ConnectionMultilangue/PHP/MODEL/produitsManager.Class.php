<?php

class ProduitsManager 
{
	public static function add(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO produits (libelleProduit,prix,dateDePeremption) VALUES (:libelleProduit,:prix,:dateDePeremption)");
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":prix", $obj->getPrix());
		$q->bindValue(":dateDePeremption", $obj->getDateDePeremption());
		$q->execute();
	}

	public static function update(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE produits SET libelleProduit=:libelleProduit,prix=:prix,dateDePeremption=:dateDePeremption WHERE idProduit=:idProduit");
		$q->bindValue(":idProduit", $obj->getIdProduit());
		$q->bindValue(":libelleProduit", $obj->getLibelleProduit());
		$q->bindValue(":prix", $obj->getPrix());
		$q->bindValue(":dateDePeremption", $obj->getDateDePeremption());
		$q->execute();
	}
	
	public static function delete(Produits $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM produits WHERE idProduit=" .$obj->getIdProduit());
	}


	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM produits WHERE idProduit =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Produits($results);
		}
		else
		{
			return false;
		}
	}


	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM produits");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Produits($donnees);
			}
		}
		return $liste;
	}
}