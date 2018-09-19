<?php

function listPlanDetails(){

	$sqlListPlanDetails = "SELECT PD.ID AS planDetailId, PD.DESCRIPTION AS planDetailDescription, PD.PLAN_ID AS planId, P.NAME AS planName
                        FROM PLAN_DETAIL AS PD
												JOIN PLAN AS P ON P.ID = PD.PLAN_ID
                        WHERE 1";

	$sqlListPlans = "SELECT P.ID AS planId, P.NAME AS planName
                        FROM PLAN AS P
                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListPlanDetails);
			$stmt->execute();
      $planDetails = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListPlans);
			$stmt->execute();
      $plans = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->planDetails = $planDetails;
			$response->plans = $plans;

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
