<?php

function editContract(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlContractUpdate = "UPDATE CONTRACT AS CT
                      SET CT.START = :contractStart,
                          CT.END = :contractEnd,
                          CT.COMPANY_ID = :companyId,
                          CT.PLAN_ID = :planId,
                          CT.TARIFF_RULE_ID = :tariffRuleId,
                          CT.STATUS = :contractStatus
                      WHERE CT.ID = :contractId";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlContractUpdate);
			$stmt->bindParam("contractStart",$json->contractStart);
      $stmt->bindParam("contractEnd",$json->contractEnd);
      $stmt->bindParam("companyId",$json->companyId);
      $stmt->bindParam("planId",$json->planId);
      $stmt->bindParam("tariffRuleId",$json->tariffRuleId);
      $stmt->bindParam("contractStatus",$json->contractStatus);
      $stmt->bindParam("contractId",$json->contractId);
      $stmt->execute();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Contrato alterado com sucesso";

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
