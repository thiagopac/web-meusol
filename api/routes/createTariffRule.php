<?php

function createTariffRule(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

  $sqlTariffRuleSelect = "SELECT TR.ID
                        FROM TARIFF_RULE AS TR
                        WHERE TR.SUBCLASS_ID = :subclassId
                        AND TR.TARIFF_MODALITY_ID = :tariffModalityId
                        AND TR.TARIFF_ID = :tariffId";

	$sqlTariffRuleInsert = "INSERT INTO TARIFF_RULE (SUBCLASS_ID, TARIFF_MODALITY_ID, TARIFF_ID) VALUES (:subclassId, :tariffModalityId, :tariffId)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlTariffRuleSelect);
      $stmt->bindParam("subclassId",$json->subclassId);
      $stmt->bindParam("tariffModalityId",$json->tariffModalityId);
      $stmt->bindParam("tariffId",$json->tariffId);
      $stmt->execute();
      $existingTariffRule = $stmt->fetch(PDO::FETCH_OBJ);
      $count = $stmt->rowCount(); //número de linhas afetadas

      if ($count == 0) {

        //SQL AND BIND
        $stmt = $conn->prepare($sqlTariffRuleInsert);
        $stmt->bindParam("subclassId",$json->subclassId);
        $stmt->bindParam("tariffModalityId",$json->tariffModalityId);
        $stmt->bindParam("tariffId",$json->tariffId);
        $stmt->execute();
        $lastInsertId = $conn->lastInsertId();
        $affectedData = $stmt->rowCount(); //número de linhas afetadas

        $feedbackStatus = "success";
        $feedbackTitle = "Sucesso";
        $feedbackMessage = "Regra tarifária adicionada com sucesso";

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
          $response->feedbackMessage = "Não foi possível criar a regra tarifária.";
        }

      }else{
        $response = new stdClass();
        $response->status = 2;
        $response->statusMessage = "Não foi possível alterar o registro.";
        $response->feedbackStatus = "warning";
        $response->feedbackTitle = "Aviso";
        $response->feedbackMessage = "Já existe uma regra tarifária com estas configurações. Não é possível duplicar regras tarifárias.";
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
