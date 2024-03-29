<?php

//Test RolesManager

echo "recherche id = 1" . "<br>";
$obj =RolesManager::findById(1);
var_dump($obj);
echo $obj->toString();

echo "ajout de l'objet". "<br>";
$newObj = new Roles(["TitreRole" => "([value 1])", "numRole" => "([value 2])"]);
var_dump(RolesManager::add($newObj));

echo "Liste des objets" . "<br>";
$array = RolesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on met à jour l'id 1" . "<br>";
$obj->setTitreRole("[(Value)]");
RolesManager::update($obj);
$objUpdated = RolesManager::findById(1);
echo "Liste des objets" . "<br>";
$array = RolesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

echo "on supprime un objet". "<br>";
$obj = RolesManager::findById(1);
RolesManager::delete($obj);
echo "Liste des objets" . "<br>";
$array = RolesManager::getList();
foreach ($array as $unObj)
{
	echo $unObj->toString() . "<br><br>";
}

?>