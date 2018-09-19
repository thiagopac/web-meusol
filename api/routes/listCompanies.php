<?php

function listCompanies(){

	$sqlListCompanies = "SELECT CO.ID AS companyId, CO.CNPJ AS companyCnpj, CO.COMPANY_NAME AS companyName, CO.COMMERCIAL_NAME AS companyCommercialName,
															CO.INSTALLATION_CONSUMER AS companyInstallationConsumer, CO.STREET AS companyStreet, CO.NUMBER AS companyNumber, CO.NEIBORHOOD AS companyNeiborhood,
															CO.CITY AS companyCity, CO.STATE AS companyState, CO.ZIPCODE AS companyZipcode, CO.LAT AS companyLatitude, CO.LON AS companyLongitude,
															CO.REFERRAL_CODE AS companyReferralCode, CO.INACTIVE AS companyInactive
											 FROM COMPANY AS CO
											 WHERE 1";

	 $sqlListContacts = "SELECT CN.ID AS contactId, CN.NAME AS contactName, CN.EMAIL AS contactEmail, CN.PHONE as contactPhone, CN.COMPANY_ID as companyId
                         FROM CONTACT AS CN
                         WHERE CN.COMPANY_ID = :companyId";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListCompanies);
			$stmt->execute();
      $companies = $stmt->fetchAll(PDO::FETCH_OBJ);

			foreach ($companies as $company) {

				//SQL AND BIND
				$stmt = $conn->prepare($sqlListContacts);
				$stmt->bindParam("companyId",$company->companyId);
				$stmt->execute();
				$contacts = $stmt->fetchAll(PDO::FETCH_OBJ);

				$company->contacts = $contacts;
			}

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

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
