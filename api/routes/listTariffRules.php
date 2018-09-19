<?php

function listTariffRules(){

	$sqlListTariffRules = "SELECT TR.ID AS tariffRuleId, TR.SUBCLASS_ID AS subclassId, S.NAME AS subclassName, TR.TARIFF_MODALITY_ID as tariffModalityId,
																TM.NAME as tariffModalityName, TR.TARIFF_ID AS tariffId, T.VALUE AS tariffValue
                        FROM TARIFF_RULE AS TR
												JOIN SUBCLASS AS S ON S.ID = TR.SUBCLASS_ID
												JOIN TARIFF_MODALITY AS TM ON TM.ID = TR.TARIFF_MODALITY_ID
												JOIN TARIFF AS T ON T.ID = TR.TARIFF_ID
                        WHERE 1
												ORDER BY TR.ID DESC";

	$sqlListSubclasses = "SELECT S.ID AS subclassId, S.NAME AS subclassName
                        FROM SUBCLASS AS S
                        WHERE 1";

	$sqlListTariffModalities = "SELECT TM.ID AS tariffModalityId, TM.NAME AS tariffModalityName
			                        FROM TARIFF_MODALITY AS TM
			                        WHERE 1";

	$sqlListTariffs = "SELECT T.ID AS tariffId, T.VALUE AS tariffValue
                        FROM TARIFF AS T
                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListTariffRules);
			$stmt->execute();
      $tariffRules = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListSubclasses);
			$stmt->execute();
      $subclasses = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListTariffModalities);
			$stmt->execute();
      $tariffModalities = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListTariffs);
			$stmt->execute();
      $tariffs = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->tariffRules = $tariffRules;
			$response->subclasses = $subclasses;
			$response->tariffModalities = $tariffModalities;
			$response->tariffs = $tariffs;

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
