<?php

function createContract(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlContractInsert = "INSERT INTO CONTRACT (START, END, COMPANY_ID, PLAN_ID, TARIFF_RULE_ID, STATUS)
                        VALUES (:contractStart, :contractEnd, :companyId, :planId, :tariffRuleId, :contractStatus)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlContractInsert);
			$stmt->bindParam("contractStart",$json->contractStart);
      $stmt->bindParam("contractEnd",$json->contractEnd);
      $stmt->bindParam("companyId",$json->companyId);
      $stmt->bindParam("planId",$json->planId);
      $stmt->bindParam("tariffRuleId",$json->tariffRuleId);
      $stmt->bindParam("contractStatus",$json->contractStatus);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Contrato adicionado com sucesso";

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
        $response->feedbackMessage = "Não foi possível criar o contrato.";
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
