<?php

function editDiscount(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlDiscountUpdate = "UPDATE DISCOUNT AS D
                      SET D.VALUE = :discountValue,
                          D.DESCRIPTION = :discountDescription,
                          D.NAME = :discountName
                      WHERE D.ID = :discountId";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlDiscountUpdate);
			$stmt->bindParam("discountValue",$json->discountValue);
      $stmt->bindParam("discountDescription",$json->discountDescription);
      $stmt->bindParam("discountName",$json->discountName);
      $stmt->bindParam("discountId",$json->discountId);
      $stmt->execute();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "Desconto alterado com sucesso";

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
