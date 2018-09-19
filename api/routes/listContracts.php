<?php

function listContracts(){

	$sqlListContracts = "SELECT CT.ID AS contractId, CT.START AS contractStart, CT.END AS contractEnd, CT.COMPANY_ID AS companyId, CO.COMPANY_NAME as companyName,
																CT.PLAN_ID AS planId, P.NAME AS planName, CT.TARIFF_RULE_ID AS tariffRuleId, CT.STATUS AS contractStatus
                        FROM CONTRACT AS CT
												JOIN COMPANY AS CO ON CO.ID = CT.COMPANY_ID
												JOIN PLAN AS P ON P.ID = CT.PLAN_ID
												JOIN TARIFF_RULE AS TR ON TR.ID = CT.TARIFF_RULE_ID
                        WHERE 1
												ORDER BY CT.ID DESC";

	$sqlListCompanies = "SELECT CO.ID AS companyId, CO.COMPANY_NAME AS companyName
                        FROM COMPANY AS CO
                        WHERE 1";

	$sqlListPlans = "SELECT P.ID AS planId, P.NAME AS planName
			                        FROM PLAN AS P
			                        WHERE 1";

	$sqlListTariffRules = "SELECT TR.ID AS tariffRuleId, TR.SUBCLASS_ID AS subclassId, S.NAME AS subclassName, TR.TARIFF_MODALITY_ID as tariffModalityId,
																TM.NAME as tariffModalityName, TR.TARIFF_ID AS tariffId, T.VALUE AS tariffValue
                        FROM TARIFF_RULE AS TR
												JOIN SUBCLASS AS S ON S.ID = TR.SUBCLASS_ID
												JOIN TARIFF_MODALITY AS TM ON TM.ID = TR.TARIFF_MODALITY_ID
												JOIN TARIFF AS T ON T.ID = TR.TARIFF_ID
                        WHERE 1
												ORDER BY TR.ID ASC";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListContracts);
			$stmt->execute();
      $contracts = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListCompanies);
			$stmt->execute();
      $companies = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListPlans);
			$stmt->execute();
      $plans = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListTariffRules);
			$stmt->execute();
      $tariffRules = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->contracts = $contracts;
			$response->companies = $companies;
			$response->plans = $plans;
			$response->tariffRules = $tariffRules;

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
