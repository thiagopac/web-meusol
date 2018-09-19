<?php

function createSupportSubject(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlSupportSubjectInsert = "INSERT INTO SUPPORT_SUBJECT (NAME, DESCRIPTION) VALUES (:supportSubjectName, :supportSubjectDescription)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlSupportSubjectInsert);
			$stmt->bindParam("supportSubjectName",$json->supportSubjectName);
      $stmt->bindParam("supportSubjectDescription",$json->supportSubjectDescription);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Área de suporte adicionada com sucesso";

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
        $response->feedbackMessage = "Não foi possível criar a área de suporte.";
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
