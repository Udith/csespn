<?php

    require_once './global.inc.php';
	verify_oauth_session_exists();

    if (HttpSession::currentUser()->getOrganization()->access_level > 2) {
        $id = $_POST["id"];
        $queryString = $_POST["queryString"];
		$idUser = $_POST["idUser"];
		
		
        $isNew = is_numeric($id) && $id > 0?false:true;

        $project = new Project($_POST);
        $project->save($isNew);
        $project->setBatches($_POST["batch"]);
		
		header("Location: projects.php".$queryString);
        die();
    }
?>