<?php

function createCompany(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlCompanyInsert = "INSERT INTO COMPANY (CNPJ, COMPANY_NAME, COMMERCIAL_NAME, INSTALLATION_CONSUMER, STREET, NUMBER, NEIBORHOOD, CITY, STATE, ZIPCODE, LAT, LON, REFERRAL_CODE, INACTIVE)
                      VALUES (:companyCnpj, :companyName, :companyCommercialName, :companyInstallationConsumer, :companyStreet, :companyNumber, :companyNeiborhood, :companyCity,
                              :companyState, :companyZipcode, :companyLatitude, :companyLongitude, :companyReferralCode, :companyInactive)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlCompanyInsert);
			$stmt->bindParam("companyCnpj",$json->companyCnpj);
      $stmt->bindParam("companyName",$json->companyName);
      $stmt->bindParam("companyCommercialName",$json->companyCommercialName);
      $stmt->bindParam("companyInstallationConsumer",$json->companyInstallationConsumer);
      $stmt->bindParam("companyStreet",$json->companyStreet);
      $stmt->bindParam("companyNumber",$json->companyNumber);
      $stmt->bindParam("companyNeiborhood",$json->companyNeiborhood);
      $stmt->bindParam("companyCity",$json->companyCity);
      $stmt->bindParam("companyState",$json->companyState);
      $stmt->bindParam("companyZipcode",$json->companyZipcode);
      $stmt->bindParam("companyLatitude",$json->companyLatitude);
      $stmt->bindParam("companyLongitude",$json->companyLongitude);
      $stmt->bindParam("companyReferralCode",$json->companyReferralCode);
      $stmt->bindParam("companyInactive",$json->companyInactive);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Empresa adicionada com sucesso";

      if ($affectedData > 0) {

        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro inserido com sucesso.";
        $response->feedbackStatus = $feedbackStatus;
        $response->feedbackTitle = $feedbackTitle;
        $response->feedbackMessage = $feedbackMessage;

      }else{

        $response = new stdClass();
        $response->status = 2;
        $response->statusMessage = "Não foi possível inserir o registro.";
        $response->feedbackStatus = "error";
        $response->feedbackTitle = "Atenção";
        $response->feedbackMessage = "Não foi possível criar a empresa.";
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
