<?php

function listPlans(){

	$sqlListPlans = "SELECT P.ID AS planId, P.NAME AS planName, P.DURATION AS planDuration, P.DISCOUNT_ID as discountId, D.VALUE as planDiscount
                        FROM PLAN AS P
												JOIN DISCOUNT AS D ON D.ID = P.DISCOUNT_ID
                        WHERE 1";

	$sqlListDiscounts = "SELECT D.ID AS discountId, D.NAME AS discountName, D.DESCRIPTION AS discountDescription, D.VALUE AS discountValue
                        FROM DISCOUNT AS D
                        WHERE 1";

	$sqlListPlanDetails = "SELECT PD.DESCRIPTION AS planDetailDescription
													FROM PLAN_DETAIL AS PD
													WHERE PD.PLAN_ID = :planId";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListPlans);
			$stmt->execute();
      $plans = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListDiscounts);
			$stmt->execute();
      $discounts = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach ($plans as $plan) {

				//SQL AND BIND
				$stmt = $conn->prepare($sqlListPlanDetails);
				$stmt->bindParam("planId",$plan->planId);
				$stmt->execute();
	      $planDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
				$plan->planDetails = $planDetails;

			}

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->plans = $plans;
			$response->discounts = $discounts;

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
