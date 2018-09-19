<?php

function retrieveSupports($companyId){

	$sqlListSupports = "SELECT SU.ID AS supportId, SU.SUPPORT_SUBJECT_ID AS supportSubjectId, SU.MESSAGE AS supportMessage, SU.COMPANY_ID AS companyId, CO.COMPANY_NAME AS companyName,
														 SU.DIN AS supportDate, SU.READ AS supportRead, SU.SOLUTION AS supportSolution, SU.SOLVED AS supportSolved, SU.URGENCY AS supportUrgency,
														 SS.NAME as supportSubjectName
                        FROM SUPPORT AS SU
												JOIN SUPPORT_SUBJECT AS SS ON SS.ID = SU.SUPPORT_SUBJECT_ID
												JOIN COMPANY AS CO ON CO.ID = SU.COMPANY_ID
                        WHERE SU.COMPANY_ID = :companyId";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListSupports);
			$stmt->bindParam("companyId",$companyId);
			$stmt->execute();
      $supports = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->supports = $supports;

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
