<?php

function createSupport(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlSupportInsert = "INSERT INTO SUPPORT (SUPPORT_SUBJECT_ID, MESSAGE, COMPANY_ID, URGENCY) VALUES (:subjectId, :supportMessage, :companyId, :supportUrgency)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlSupportInsert);
			$stmt->bindParam("subjectId",$json->subjectId);
      $stmt->bindParam("supportMessage",$json->supportMessage);
      $stmt->bindParam("companyId",$json->companyId);
      $stmt->bindParam("supportUrgency",$json->supportUrgency);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Chamado de suporte criado com sucesso";

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
        $response->feedbackMessage = "Não foi possível criar o chamado de suporte.";
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
