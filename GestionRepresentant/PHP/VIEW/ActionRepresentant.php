<?php

$representant = new Representants($_POST);

$mode = $_GET['mode'];

switch ($mode) {
    case "add":
        {
            RepresentantsManager::add($representant);
            break;
        }
    case "update":
        {
            RepresentantsManager::update($representant);
            break;
        }
    case "delete":
        {
            RepresentantsManager::delete($representant);
            break;
        }
}

header("location: index.php?p=accueil");
