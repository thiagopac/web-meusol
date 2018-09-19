<?php

function createReferralRegistry(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlReferralRegistryInsert = "INSERT INTO REFERRAL_REGISTRY (EMAIL, SENDER, COMPANY_NAME) VALUES (:companyReceiverEmail, :companySenderId, :companyReceiverName)";

  try{

      // debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlReferralRegistryInsert);
			$stmt->bindParam("companyReceiverName",$json->companyReceiverName);
      $stmt->bindParam("companyReceiverEmail",$json->companyReceiverEmail);
      $stmt->bindParam("companySenderId",$json->companySenderId);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      $feedbackStatus = "success";
      $feedbackTitle = "Sucesso";
      $feedbackMessage = "O convite foi enviado para o e-mail $json->companyReceiverEmail";

      if ($affectedData > 0) {

        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro inserido com sucesso.";
        $response->feedbackStatus = $feedbackStatus;
        $response->feedbackTitle = $feedbackTitle;
        $response->feedbackMessage = $feedbackMessage;

        $referralCode = $json->companySenderReferralCode;

        $to = $json->contactEmail;
        $subject = "[ Meu Sol - Fazenda Solar ] - Convite";
        $message = "$json->companySenderName convidou você a conhecer a Meu Sol - Fazenda Solar. Para conhecer nossa proposta, acesse o link: <p><a href='http://meusol.net/site/?ref=$referralCode'>http://meusol.net/site/?ref=$referralCode</a></p>";
        $headers = "From: contato@meusol.net\r\n";
        $headers .= "Reply-To: contato@meusol.net\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        mail($to, $subject, $message, $headers);

        // $response->link = "http://localhost/meusol/site/?ref=".$referralCode;

    }else{

      $response = new stdClass();
      $response->status = 2;
      $response->statusMessage = "Não foi possível inserir o registro.";
      $feedbackStatus = "error";
      $feedbackTitle = "Atenção";
      $feedbackMessage = "Não foi possível enviar o convite para $json->companyEmail. Tente novamente mais tarde.";
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
