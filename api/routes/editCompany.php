<?php

function editCompany(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlCompanyUpdate = "UPDATE COMPANY AS CO
                        SET CO.CNPJ = :companyCnpj,
                            CO.COMPANY_NAME = :companyName,
                            CO.COMMERCIAL_NAME = :companyCommercialName,
                            CO.INSTALLATION_CONSUMER = :companyInstallationConsumer,
                            CO.STREET = :companyStreet,
                            CO.NUMBER = :companyNumber,
                            CO.NEIBORHOOD = :companyNeiborhood,
                            CO.CITY = :companyCity,
                            CO.STATE = :companyState,
                            CO.ZIPCODE = :companyZipcode,
                            CO.LAT = :companyLatitude,
                            CO.LON = :companyLongitude,
                            CO.INACTIVE = :companyInactive
                        WHERE CO.ID = :companyId";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlCompanyUpdate);
			$stmt->bindParam("companyId",$json->companyId);
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
      $stmt->bindParam("companyInactive",$json->companyInactive);
      $stmt->execute();
      $error = $stmt->errorInfo();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas


      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Empresa alterada com sucesso";

      if ($affectedData != 0) {
        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro alterado com sucesso.";
        $response->feedbackStatus = $feedbackStatus;
        $response->feedbackTitle = $feedbackTitle;
        $response->feedbackMessage = $feedbackMessage;
      }else{
        $response = new stdClass();
        $response->status = 2;
        $response->statusMessage = "Não foi possível alterar o registro.";
        $response->feedbackStatus = "warning";
        $response->feedbackTitle = "Aviso";
        $response->feedbackMessage = "Ocorreu um erro ou não foram enviadas alterações";
        $response->error = $error;
        $response->affectedData = $affectedData;
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
