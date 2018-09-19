<?php

function createDiscount(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlDiscountInsert = "INSERT INTO DISCOUNT (NAME, DESCRIPTION, VALUE) VALUES (:discountName, :discountDescription, :discountValue)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlDiscountInsert);
			$stmt->bindParam("discountName",$json->discountName);
      $stmt->bindParam("discountDescription",$json->discountDescription);
      $stmt->bindParam("discountValue",$json->discountValue);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Desconto adicionado com sucesso";

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
        $response->feedbackMessage = "Não foi possível criar o desconto.";
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
