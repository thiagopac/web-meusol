<?php

function retrieveContract($companyId){

	$sqlContractSelect = "SELECT CT.ID contractId, CT.START contractStart, CT.END contractEnd, CT.COMPANY_ID companyId, CO.COMPANY_NAME AS companyName, CO.CNPJ as companyCnpj,
															 CT.PLAN_ID planId, P.NAME AS planName,
												       CASE
															 		WHEN CT.STATUS = 0 THEN 'inativo'
																	WHEN CT.STATUS = 1 THEN 'ativo'
																	WHEN CT.STATUS = 2 THEN 'cancelado'
															 END AS contractStatus
												FROM CONTRACT CT
												JOIN COMPANY CO ON CO.ID = CT.COMPANY_ID
												JOIN PLAN P ON P.ID = CT.PLAN_ID
												WHERE CT.COMPANY_ID = :companyId";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlContractSelect);
			$stmt->bindParam("companyId",$companyId);
			$stmt->execute();
      $contract = $stmt->fetch(PDO::FETCH_OBJ);
			$count = $stmt->rowCount(); //número de linhas afetadas

			if ($count > 0) {

				//RESPONSE
				$response = new stdClass();
				$response->status = 1;
				$response->statusMessage = "Dados recuperados com sucesso.";

				$response->contract = $contract;

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
