<?php

function retrieveReferralRegistries($companyId){

	$sqlReferralRegistrySelect = "SELECT RR.EMAIL AS referralRegistryEmail, RR.COMPANY_NAME referralRegistryCompanyName, RR.DIN AS referralRegistryDate
												FROM REFERRAL_REGISTRY AS RR
												WHERE RR.SENDER = :companyId
												ORDER BY RR.ID DESC";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlReferralRegistrySelect);
			$stmt->bindParam("companyId",$companyId);
			$stmt->execute();
      $referralRegistries = $stmt->fetchAll(PDO::FETCH_OBJ);
			$count = $stmt->rowCount(); //número de linhas afetadas

			//RESPONSE
			$response = new stdClass();
			$response->status = 1;
			$response->statusMessage = "Dados recuperados com sucesso.";

			$response->referralRegistries = $referralRegistries;

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
