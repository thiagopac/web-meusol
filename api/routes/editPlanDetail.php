<?php

function editPlanDetail(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlPlanDetailUpdate = "UPDATE PLAN_DETAIL AS PD
                          SET PD.DESCRIPTION = :planDetailDescription,
                              PD.PLAN_ID = :planId
                          WHERE PD.ID = :planDetailId";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlPlanDetailUpdate);
			$stmt->bindParam("planDetailDescription",$json->planDetailDescription);
      $stmt->bindParam("planId",$json->planId);
      $stmt->bindParam("planDetailId",$json->planDetailId);
      $stmt->execute();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Item do plano alterado com sucesso";

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
