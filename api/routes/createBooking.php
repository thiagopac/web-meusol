<?php

function createBooking(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

  // debug
  // echo json_encode($json, JSON_NUMERIC_CHECK);
  // exit;

	$sqlTariffRuleSelect = "SELECT TR.ID AS tariffRuleId
														FROM TARIFF_RULE AS TR
														WHERE TR.SUBCLASS_ID = :subclassId
														AND TR.TARIFF_MODALITY_ID = :tariffModalityId";

	$sqlBookingInsert = "INSERT INTO BOOKING (CNPJ, INSTALLATION_CONSUMER, COMPANY_NAME, RESPONSIBLE_NAME, RESPONSIBLE_EMAIL, RESPONSIBLE_PHONE, TARIFF_RULE_ID, PLAN_ID)
                          VALUES (:cnpj, :installationConsumer, :companyName, :responsibleName, :responsibleEmail, :responsiblePhone, :tariffRuleId, :planId)";

  try{
      $conn = getConn();

			$stmt = $conn->prepare($sqlTariffRuleSelect);
			$stmt->bindParam("subclassId",$json->subclassId);
      $stmt->bindParam("tariffModalityId",$json->tariffModalityId);
			$stmt->execute();
			$tariffRule = $stmt->fetch(PDO::FETCH_OBJ);

      //SQL AND BIND
      $stmt = $conn->prepare($sqlBookingInsert);
      $stmt->bindParam("cnpj",$json->cnpj);
      $stmt->bindParam("installationConsumer",$json->installationConsumer);
      $stmt->bindParam("companyName",$json->companyName);
      $stmt->bindParam("responsibleName",$json->responsibleName);
			$stmt->bindParam("responsibleEmail",$json->responsibleEmail);
      $stmt->bindParam("responsiblePhone",$json->responsibleEmail);
      $stmt->bindParam("tariffRuleId",$tariffRule->tariffRuleId);
      $stmt->bindParam("planId",$json->planId);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Seu pedido de reserva foi enviado com sucesso. Ele passará por aprovação e o resultado será enviado no e-mail $json->responsibleEmail";

      if ($json->subclassId == 1) {
        $feedbackStatus = "warning";
        $feedbackTitle = "Atenção";
        $feedbackMessage = "Infelizmente nossos planos não contemplam clientes residenciais. Neste caso, o ideal seria adquirir seu próprio sistema fotovoltáico. Enviaremos seus dados para uma empresa parceira apresentar soluções financeiras adequadas.";
      }

      if ($json->tariffModalityId == 3 || $json->tariffModalityId == 4) {
        $feedbackStatus = "warning";
        $feedbackTitle = "Atenção";
        $feedbackMessage = "Você possui um contrato de demanda com a distribuidora. Infelizmente nossos planos não contemplam clientes dessa modalidade tarifária. Neste caso, o ideal seria adquirir seu próprio sistema fotovoltáico. Enviaremos seus dados para uma empresa parceira apresentar soluções financeiras adequadas.";
      }

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
