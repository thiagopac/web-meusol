<?php

function listSupports(){

	$sqlListSupports = "SELECT SU.ID AS supportId, SU.SUPPORT_SUBJECT_ID AS supportSubjectId, SU.MESSAGE AS supportMessage, SU.COMPANY_ID AS companyId, CO.COMPANY_NAME AS companyName,
														 SU.DIN AS supportDate, SU.READ AS supportRead, SU.SOLUTION AS supportSolution, SU.SOLVED AS supportSolved, SU.URGENCY AS supportUrgency
                        FROM SUPPORT AS SU
												JOIN COMPANY AS CO ON CO.ID = SU.COMPANY_ID
                        WHERE 1";

	$sqlListSupportSubjects = "SELECT SS.ID AS supportSubjectId, SS.NAME AS supportSubjectName, SS.DESCRIPTION AS supportSubjectDescription
                        			FROM SUPPORT_SUBJECT AS SS
                        			WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListSupports);
			$stmt->execute();
      $supports = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListSupportSubjects);
			$stmt->execute();
      $supportSubjects = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->supports = $supports;
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
