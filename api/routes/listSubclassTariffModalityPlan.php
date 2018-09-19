<?php

function listSubclassTariffModalityPlan(){

  $sqlListSubclasses = "SELECT S.ID AS subclassId, S.NAME AS subclassName
                        FROM SUBCLASS AS S
                        WHERE 1";

  $sqlListTariffModalities = "SELECT T.ID AS tariffModalityId, T.NAME AS tariffModalityName
                        FROM TARIFF_MODALITY AS T
                        WHERE 1";

	$sqlListPlans = "SELECT P.ID AS planId, P.NAME AS planName
                        FROM PLAN AS P
                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
      $stmt = $conn->prepare($sqlListSubclasses);
      $stmt->execute();
      $subclasses = $stmt->fetchAll(PDO::FETCH_OBJ);

      $stmt = $conn->prepare($sqlListTariffModalities);
      $stmt->execute();
      $tariffModalities = $stmt->fetchAll(PDO::FETCH_OBJ);

			$stmt = $conn->prepare($sqlListPlans);
			$stmt->execute();
      $plans = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->subclasses = $subclasses;
      $response->tariffModalities = $tariffModalities;
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
