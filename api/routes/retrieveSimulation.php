<?php

function retrieveSimulation($simulationId){

	$sqlSimulationSelect = "SELECT S.ID AS simulationId, SU.NAME AS subclassName, TM.NAME AS tariffModalityName, S.MONTHLY_CONSUMPTION AS simulationMonthlyConsumption,
																 P.NAME AS planName, S.CONTACT_EMAIL AS simulationContactEmail,
																 (S.MONTHLY_CONSUMPTION * T.VALUE) AS billBeforeValue,
																 ((S.MONTHLY_CONSUMPTION - 100) * T.VALUE) - (((S.MONTHLY_CONSUMPTION - 100) * T.VALUE) * D.VALUE) AS billAfterValue,
																 (100 * T.VALUE) AS availabilityCost,
																 ((S.MONTHLY_CONSUMPTION * T.VALUE)) - (((S.MONTHLY_CONSUMPTION - 100) * T.VALUE) - ((((S.MONTHLY_CONSUMPTION - 100) * T.VALUE) * D.VALUE)) + (100 * T.VALUE)) AS savedValue,
																 (((S.MONTHLY_CONSUMPTION * T.VALUE)) - (((S.MONTHLY_CONSUMPTION - 100) * T.VALUE) - ((((S.MONTHLY_CONSUMPTION - 100) * T.VALUE) * D.VALUE)) + (100 * T.VALUE))) * 12 AS savedInYear
													FROM SIMULATION AS S
													JOIN TARIFF_RULE AS TR ON TR.ID = S.TARIFF_RULE_ID
													JOIN SUBCLASS AS SU ON SU.ID = TR.SUBCLASS_ID
													JOIN TARIFF AS T ON T.ID = TR.TARIFF_ID
													JOIN TARIFF_MODALITY AS TM ON TM.ID = TR.TARIFF_MODALITY_ID
													JOIN PLAN AS P ON P.ID = S.PLAN_ID
													JOIN DISCOUNT AS D ON D.ID = P.DISCOUNT_ID
													WHERE MD5(S.ID) = :simulationId";

//HELP
// billBeforeValue: média de consumo * tarifa cemig para aquela subclasse e modalidade tarifária (ex: 12000 hWk * 0.866 = 10392)
// billAfterValue: média de consumo * tarifa cemig - 100 detaxa de disponibilidade, menos o desconto do plano (ex: 12000 - 1000 = 11900... 11900 * 0.866 = 10305.4 - 15% do plano premium = 8759.59)
// availabilityCost: taxa de dispobilidade cobrada pela cemig * tarifa cemig.. 100 kWh obrigatórios na conta (ex: 100 * 0.866 = 86.6)
// savedValue: billBeforeValue - (billAfterValue + availabilityCost) (ex: 10392 - (8759.59 + 86.6) = 1545.81)

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlSimulationSelect);
			$stmt->bindParam("simulationId",$simulationId);
			$stmt->execute();
      $simulation = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount(); //número de linhas afetadas

			if ($count > 0) {

				//RESPONSE
	      $response = new stdClass();
	      $response->status = 1;
	      $response->statusMessage = "Dados recuperados com sucesso.";

	      $response->simulation = $simulation;

			}else{

				//RESPONSE
				$response = new stdClass();
				$response->status = 2;
				$response->statusMessage = "Não foi possível recuperar o registro.";
			}

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
