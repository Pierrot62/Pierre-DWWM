<?php
//fichier pour appel AJAX
// var_dump($_POST["test"]);
$id=$_POST["idPersonne"];
echo json_encode(PersonneManager::getById($id,true));
