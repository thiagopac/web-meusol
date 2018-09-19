<?php

function retrieveMonthlyPayment($companyId, $qtyResults){

	$sqlFinancialSelect = "SELECT F.ID financialId, F.YEAR financialYear, F.MONTH financialMonth, F.VALUE financialValue, F.QUIT_DATE financialQuitDate, F.CONTRACT_ID financialContractId
												 FROM FINANCIAL F
												 JOIN CONTRACT AS CT ON CT.ID = F.CONTRACT_ID
												 JOIN COMPANY AS CO ON CO.ID = CT.COMPANY_ID
												 WHERE CT.COMPANY_ID = :companyId
												 ORDER BY F.ID DESC
												 LIMIT :qtyResults";

// echo json_encode($sqlFinancialSelect, JSON_NUMERIC_CHECK);
// exit;

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlFinancialSelect);
			$stmt->bindParam("companyId",$companyId);
			$stmt->bindValue("qtyResults", (int)$qtyResults, PDO::PARAM_INT);
			$stmt->execute();
      $financial = $stmt->fetchAll(PDO::FETCH_OBJ);
			$count = $stmt->rowCount(); //número de linhas afetadas

			if ($count > 0) {

				//RESPONSE
				$response = new stdClass();
				$response->status = 1;
				$response->statusMessage = "Dados recuperados com sucesso.";

				$response->financial = $financial;

			}else{

				//RESPONSE
	      $response = new stdClass();
	      $response->status = 2;
	      $response->statusMessage = "Não foi possível recuperar os dados.";
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
