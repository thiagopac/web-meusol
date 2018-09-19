<?php

function editSupport(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlSupportUpdate = "UPDATE SUPPORT AS SU
                      SET SU.SUPPORT_SUBJECT_ID = :subjectId,
                          SU.MESSAGE = :supportMessage,
                          SU.SOLUTION = :supportSolution,
                          SU.SOLVED = :supportSolved,
                          SU.URGENCY = :supportUrgency
                      WHERE SU.ID = :supportId";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlSupportUpdate);
			$stmt->bindParam("subjectId",$json->subjectId);
      $stmt->bindParam("supportId",$json->supportId);
      $stmt->bindParam("supportMessage",$json->supportMessage);
      $stmt->bindParam("supportSolution",$json->supportSolution);
      $stmt->bindParam("supportSolved",$json->supportSolved);
      $stmt->bindParam("supportUrgency",$json->supportUrgency);
      $stmt->execute();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Chamado alterado com sucesso";

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
