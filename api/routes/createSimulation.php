<?php

function createSimulation(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlTariffRuleSelect = "SELECT TR.ID AS tariffRuleId
														FROM TARIFF_RULE AS TR
														WHERE TR.SUBCLASS_ID = :subclassId
														AND TR.TARIFF_MODALITY_ID = :tariffModalityId";

	$sqlSimulationInsert = "INSERT INTO SIMULATION (TARIFF_RULE_ID, MONTHLY_CONSUMPTION, PLAN_ID, CONTACT_EMAIL) VALUES (:tariffRuleId, :monthlyConsumption, :planId, :contactEmail)";

  try{
      $conn = getConn();

			$stmt = $conn->prepare($sqlTariffRuleSelect);
			$stmt->bindParam("subclassId",$json->subclassId);
      $stmt->bindParam("tariffModalityId",$json->tariffModalityId);
			$stmt->execute();
			$tariffRule = $stmt->fetch(PDO::FETCH_OBJ);

      //debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      //SQL AND BIND
      $stmt = $conn->prepare($sqlSimulationInsert);
      $stmt->bindParam("monthlyConsumption",$json->monthlyConsumption);
      $stmt->bindParam("planId",$json->planId);
      $stmt->bindParam("contactEmail",$json->contactEmail);
			$stmt->bindParam("tariffRuleId",$tariffRule->tariffRuleId);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Você pode conferir o resultado de sua simulação no gráfico ao lado. O resultado da simulação também foi enviado no e-mail $json->contactEmail";

      //flag que permanecerá 0 se for um cliente em potencial e enviará e-mail
      $error = 0;

      if ($json->subclassId == 1 || $json->tariffModalityId == 1) {
        $feedbackStatus = "warning";
        $feedbackTitle = "Atenção";
        $feedbackMessage = "Infelizmente nossos planos não contemplam clientes residenciais. Neste caso, o ideal seria adquirir seu próprio sistema fotovoltáico. Enviaremos seus dados para uma empresa parceira apresentar soluções financeiras adequadas.";
        $error = 1;
      }

      if ($json->tariffModalityId == 3 || $json->tariffModalityId == 4) {
        $feedbackStatus = "warning";
        $feedbackTitle = "Atenção";
        $feedbackMessage = "Você possui um contrato de demanda com a distribuidora. Infelizmente nossos planos não contemplam clientes dessa modalidade tarifária. Neste caso, o ideal seria adquirir seu próprio sistema fotovoltáico. Enviaremos seus dados para uma empresa parceira apresentar soluções financeiras adequadas.";
        $error = 1;
      }

      if ($affectedData > 0) {

        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro inserido com sucesso.";
        $response->feedbackStatus = $feedbackStatus;
        $response->feedbackTitle = $feedbackTitle;
        $response->feedbackMessage = $feedbackMessage;
        $response->simulationId = MD5($lastInsertId);

        $simulationId = MD5($lastInsertId);

        $to = $json->contactEmail;
        $subject = "[ Meu Sol - Fazenda Solar ] - Simulação de economia";
        $message = "Para acompanhar o resultado da simulação, acesse o seguinte link: <p><a href='http://meusol.net/site/simulation?id=$simulationId'>http://meusol.net/site/simulation?id=$simulationId</a></p>";
        $headers = "From: contato@meusol.net\r\n";
        $headers .= "Reply-To: contato@meusol.net\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if ($error == 0) {
          mail($to, $subject, $message, $headers);
        }

        // $response->link = "http://meusol.net/site/simulation?id=".$simulationId;

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
