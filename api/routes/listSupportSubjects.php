<?php

function listSupportSubjects(){

	$sqlListSupportSubjects = "SELECT SS.ID AS supportSubjectId, SS.NAME AS supportSubjectName, SS.DESCRIPTION AS supportSubjectDescription
                        			FROM SUPPORT_SUBJECT AS SS
                        			WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListSupportSubjects);
			$stmt->execute();
      $supportSubjects = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

			$response->supportSubjects = $supportSubjects;

      //OUTPUT
			echo json_encode($response, JSON_NUMERIC_CHECK);

			$conn = null;

	} catch(PDOException $e){

			header('HTTP/1.1 400 Bad request');
			echo json_encode($e->getMessage());

			die();
	}
}

 ?>
