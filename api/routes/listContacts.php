<?php

function listContacts(){

	$sqlListContacts = "SELECT CN.ID AS contactId, CN.NAME AS contactName, CN.EMAIL AS contactEmail, CN.PHONE as contactPhone, CN.COMPANY_ID as companyId
                        FROM CONTACT AS CN
                        WHERE 1";

	$sqlListCompanies = "SELECT CO.ID AS companyId, CO.COMPANY_NAME AS companyName
                        FROM COMPANY AS CO
                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListContacts);
			$stmt->execute();
      $contacts = $stmt->fetchAll(PDO::FETCH_OBJ);

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListCompanies);
			$stmt->execute();
      $companies = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->contacts = $contacts;
			$response->companies = $companies;

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
